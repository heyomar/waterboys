<?php

class NF_Stripe_Subs
{
	/*
	 *
	 * Function that constructs our class.
	 *
	 * @since 1.0
	 * @return void
	 */

	public function __construct() {
		// Add our submission table actions
		add_filter( 'nf_sub_table_columns', array( $this, 'filter_sub_table_columns' ), 10, 2 );
		// Add the appropriate data for our custom columns.
		add_action( 'manage_posts_custom_column', array( $this, 'stripe_columns' ), 10, 2 );
		
		// Add our CSV filters
		add_filter( 'ninja_forms_export_subs_label_array', array( $this, 'filter_csv_labels' ), 10, 2 );

		// Add our submission editor action / filter.
		add_action( 'add_meta_boxes', array( $this, 'add_stripe_info' ), 11, 2 );

    	return;
	} // function __construct

	/*
	 *
	 * Filter our submissions table columns
	 *
	 * @since 1.0.7
	 * @return void
	 */

	function filter_sub_table_columns( $cols, $form_id ) {
		// Bail if we don't have a form id.
		if ( $form_id == '' )
			return $cols;

		// Bail if we aren't working with a Stripe form.
		if ( Ninja_Forms()->form( $form_id )->get_setting( 'stripe' ) != 1 )
			return $cols;

		$cols = array_slice( $cols, 0, count( $cols ) - 1, true ) +
		    array( 'stripe_charge_id' => __( 'Stripe Charge ID', 'ninja-forms-stripe' ) ) +
		    array_slice( $cols, count( $cols ) - 1, count( $cols ) - 1, true) ;

		return $cols;

	} // function filter_sub_table_columns
	
	/*
	 *
	 * Output our Stripe column data
	 *
	 * @since 1.0.7
	 * @return void
	 */

	function stripe_columns( $column, $sub_id ) {
		if ( $column == 'stripe_charge_id' ) {
			echo Ninja_Forms()->sub( $sub_id )->get_meta( '_stripe_charge_id' );
		}

	} // function stripe_columns

	/*
	 *
	 * Modifies the header-row of the exported CSV file by adding 'Stripe Charge ID'.
	 *
	 * @since 1.0
	 * @return $label_array array
	 */

	function filter_csv_labels( $label_array, $sub_id_array ) {
		$form_id = Ninja_Forms()->sub( $sub_id_array[0] )->form_id;
		if ( Ninja_Forms()->form( $form_id )->get_setting( 'stripe' ) == 1 ) {
			$label_array[0]['_stripe_charge_id'] = __( 'Stripe Charge ID', 'ninja-forms-stripe' );		
		}

		return $label_array;	
	} // function filter_csv_labels

	/**
	 * Register a metabox to the side of the submissions page for displaying Stripe status.
	 * 
	 * @since 1.0.7
	 * @return void
	 */
	public function add_stripe_info( $post_type, $post ) {
		if ( $post_type != 'nf_sub' )
			return false;
		
		$form_id = Ninja_Forms()->sub( $post->ID )->form_id;
		if ( Ninja_Forms()->form( $form_id )->get_setting( 'stripe' ) == 1 ) {
			// Add our save field values metabox
			add_meta_box( 'nf_stripe_info', __( 'Stripe information', 'ninja-forms-stripe' ), array( $this, 'stripe_info_metabox' ), 'nf_sub', 'side', 'default');
		}
	}

	/*
	 *
	 * Outupt stripe charge ID.
	 *
	 * @since 1.0.7
	 * @return void
	 */

	function stripe_info_metabox( $sub ) {
		$form_id = Ninja_Forms()->sub( $sub->ID )->form_id;
		if ( Ninja_Forms()->form( $form_id )->get_setting( 'stripe' ) == 1 ) {
			?>
			<div class="submitbox" id="submitpost">
				<div id="minor-publishing">
					<div id="misc-publishing-actions">
						<div class="misc-pub-section misc-pub-post-status">
							<label for=""><?php _e( 'Transaction ID', 'ninja-forms-stripe' );?>:</label>
							<span id=""><strong><?php echo Ninja_Forms()->sub( $sub->ID )->get_meta( '_stripe_charge_id' ); ?></strong></span>
						</div>
					</div>
				</div>
			</div>
			<?php			
		}
	} // function stripe_info_metabox

}

// Initiate our sub settings class if we are on the admin.
function ninja_forms_stripe_modify_sub(){
	if ( is_admin() ) {
		if ( nf_st_pre_27() ) {
			$NF_Stripe_Subs = new NF_Stripe_Subs_Deprecated();
		} else {
			$NF_Stripe_Subs = new NF_Stripe_Subs();
		}
	}	
}

add_action( 'init', 'ninja_forms_stripe_modify_sub', 11 );