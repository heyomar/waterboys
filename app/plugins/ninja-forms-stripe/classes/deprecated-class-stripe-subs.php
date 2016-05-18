<?php

class NF_Stripe_Subs_Deprecated
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
		add_action( 'ninja_forms_view_sub_table_header', array( $this, 'modify_header' ) );
		add_action( 'ninja_forms_view_sub_table_row', array( $this, 'modify_tr' ), 10, 2 );
		
		// Add our CSV filters
		add_filter( 'ninja_forms_export_subs_label_array', array( $this, 'filter_csv_labels' ), 10, 2 );
		add_filter( 'ninja_forms_export_subs_value_array', array( $this, 'filter_csv_values' ), 10, 2 );

    	return;
	} // function __construct

	/*
	 *
	 * Function that modifies our view subs table header if the form has Stripe enabled.
	 *
	 * @since 1.0
	 * @return void
	 */

	function modify_header( $form_id ) {
		$form = ninja_forms_get_form_by_id( $form_id );
		if ( isset ( $form['data']['stripe'] ) AND $form['data']['stripe'] == 1 ) {
			?>
			<th><?php _e( 'Charge ID', 'ninja-forms-stripe' );?></th>
			<?php			
		}
	} // function modify_header

	/*
	 *
	 * Function that modifies our view subs table row with Stripe information.
	 *
	 * @since 1.0
	 * @return void
	 */

	function modify_tr( $form_id, $sub_id ) {
		$form = ninja_forms_get_form_by_id( $form_id );
		if ( isset( $form['data']['stripe'] ) AND $form['data']['stripe'] == 1 ) {
			$sub_row = ninja_forms_get_sub_by_id( $sub_id );

			if ( isset ( $sub_row['stripe_charge_id'] ) ) {
				$stripe_charge_id = $sub_row['stripe_charge_id'];
			} else {
				$stripe_charge_id = '';
			}

			if ( isset ( $form['data']['stripe'] ) AND $form['data']['stripe'] == 1 ) {
				?>
				<td><?php echo $stripe_charge_id;?></td>
				<?php			
			}			
		}

	} // function modify_tr

	/*
	 *
	 * Function that modifies the header-row of the exported CSV file by adding 'Charge ID'.
	 *
	 * @since 1.0
	 * @return $label_array array
	 */

	function filter_csv_labels( $label_array, $sub_id_array ) {
		$form = ninja_forms_get_form_by_sub_id( $sub_id_array[0] );
		if ( isset ( $form['data']['stripe'] ) AND $form['data']['stripe'] == 1 ) {
			array_splice($label_array[0], 1, 0, __( 'Charge ID', 'ninja-forms-stripe' ) );			
		}
		return $label_array;	
	} // function filter_csv_labels

	/*
	 *
	 * Function that modifies each row of our CSV by adding Charge ID if the form is set to use Stripe.
	 *
	 * @since 1.0
	 * @return $values_array array
	 */

	function filter_csv_values( $values_array, $sub_id_array ) {
		$form = ninja_forms_get_form_by_sub_id( $sub_id_array[0] );
		if ( isset ( $form['data']['stripe'] ) AND $form['data']['stripe'] == 1 ) {
			if( is_array( $values_array ) AND !empty( $values_array ) ){
				for ($i=0; $i < count( $values_array ); $i++) {
					if( isset( $sub_id_array[$i] ) ){
						$sub_row = ninja_forms_get_sub_by_id( $sub_id_array[$i] );
						$charge_id = $sub_row['stripe_charge_id'];

						array_splice($values_array[$i], 1, 0, $charge_id );
					}
				}
			}			
		}
		return $values_array;
	} // function filter_csv_values

}