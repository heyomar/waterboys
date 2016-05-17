<?php

/*
 *
 * This class handles the processing of a successful Stripe token.
 *
 * @since 1.0
 */

class NF_Stripe_Processing {

	/*
	 * Store our charge id
	 *
	 */
	private $charge_id;

	/*
	 * Setup our class
	 *
	 * @since 1.0
	 * @return void
	 */

	public function __construct() {
		$this->process_token();
	}

	/*
	 * Our main processing function for Stripe transactions.
	 *
	 * @since 1.0
	 * @return void
	 */

	public function process_token() {
		global $ninja_forms_processing;

		$token = $ninja_forms_processing->get_extra_value( '_stripe_token' );

		$purchase_total = $this->get_purchase_total();

		// Bail if we don't have a total
		if ( '0.00' == $purchase_total || empty( $purchase_total ) )
			return false;

		// Add an error and bail if there isn't a token and we have a total
		if ( ! $token ) {
			$ninja_forms_processing->add_error( 'invalid_token', __( 'Invalid Stripe token.', 'ninja-forms-stripe' ) );
			return false;
		}

		// load the stripe libraries
		if ( ! class_exists( 'Stripe' ) ) {
			require_once( NF_STRIPE_DIR . '/lib/Stripe.php' );
		}
 		
		$stripe_options = get_option( 'ninja_forms_stripe' );

		// check if we are using test mode
		if( $ninja_forms_processing->get_form_setting( 'stripe_test_mode' ) ) {
			$secret_key = $stripe_options['test_secret_key'];
		} else {
			$secret_key = $stripe_options['live_secret_key'];
		}

		Stripe::setApiKey( $secret_key );
  
		// Check to see if we are setting up a recurring payment plan
		$plan = $ninja_forms_processing->get_form_setting( 'stripe_recurring_plan' );
		if ( !empty ( $plan ) and $plan ) {
			// Setup the user's payment plan.
			try {
				// Loop through our fields and find our billing email address.
				$user_info = $ninja_forms_processing->get_user_info();
				if ( isset ( $user_info['billing']['email'] ) ) {
					$email = $user_info['billing']['email'];
				} else {
					$email = '';
				}

				$customer = Stripe_Customer::create(array(
						'card' => $token,
						'plan' => $plan,
						'email' => $email
					)
				);

				$this->charge_id = $customer->id;

				if ( version_compare( NINJA_FORMS_VERSION, '2.7' ) == -1 ) {
					add_filter( 'ninja_forms_save_sub_args', array( $this, 'add_charge_id' ) );
				} else {
					add_action( 'nf_save_sub', array( $this, 'add_charge_id' ) );
				}

				do_action( 'ninja_forms_stripe_success', $customer, $ninja_forms_processing->get_form_ID() );
 
			} catch (Exception $e) {
				// Add an error.
				$ninja_forms_processing->add_error( 'stripe_plan_fail', __( 'There was a problem creating your payment. Please try again.', 'ninja-forms-stripe' ) );
			}


		} else {
			// attempt to charge the customer's card
			try {
		    	// Bail if the form's total calculation field is empty.
		    	//$purchase_total = floatval ( $this->get_purchase_total() );
		    	$purchase_total = $this->get_purchase_total();

		    	$locale_info = localeconv();
				$decimal_point = $locale_info['decimal_point'];

				if ( $decimal_point == '.' ) {
					$purchase_total = str_replace( ',', '', $purchase_total );
				} else {
					$purchase_total = str_replace( '.', '', $purchase_total );
				}

		    	if ( empty (  $purchase_total ) )
		    		return;

		    	// Convert the purchase total into cents.
		    	$purchase_total = $purchase_total * 100;

				// Check User Billing Info for Email Address
				$email = NULL;
				$user_info = $ninja_forms_processing->get_user_info();
				if ( isset ( $user_info['billing']['email'] ) ) {
					$email = $user_info['billing']['email'];

					if( empty( $email ) ){
						// Stripe expects NULL as opposed to an empty string
						$email = NULL;
					}
				} else {
					$email = NULL;
				}

				$customer = NULL;
				if( $email ){
					$customer = Stripe_Customer::create(array(
							'card' => $token,
							'email' => $email
						)
					);
				}

				if( $customer ) {
					$charge = Stripe_Charge::create(array(
							'amount' => $purchase_total,
							'currency' => nf_stripe_get_currency(),
							'customer' => $customer->id,
							'description' => $this->get_description(),
						)
					);
				} else {
					$charge = Stripe_Charge::create(array(
							'amount' => $purchase_total,
							'currency' => nf_stripe_get_currency(),
							'card' => $token,
							'description' => $this->get_description(),
							'receipt_email' => $email
						)
					);
				}

				$this->charge_id = $charge->id;

				if ( version_compare( NINJA_FORMS_VERSION, '2.7' ) == -1 ) {
					add_filter( 'ninja_forms_save_sub_args', array( $this, 'add_charge_id' ) );
				} else {
					add_action( 'nf_save_sub', array( $this, 'add_charge_id' ) );
				}

				do_action( 'ninja_forms_stripe_success', $charge, $ninja_forms_processing->get_form_ID() );

			} catch ( Stripe_CardError $e ) {
				$body = $e->getJsonBody();
				$error = $body['error'];
				$message = $error['message'];
				$code = $error['code'];
				switch( $code ) {
					case 'card_declined':
						$location = 'credit_card_number';
						break;
					case 'incorrect_zip':
						// Find our billing zip field.
						$fields = $ninja_forms_processing->get_all_fields();
						foreach ( $fields as $field_id => $user_value ) {
							if ( $ninja_forms_processing->get_field_setting( $field_id, 'user_zip' ) == 1 and $ninja_forms_processing->get_field_setting( $field_id, 'user_info_field_group_name' ) == 'billing' ) {
								$location = $field_id;
								break;
							}
						}
						break;
					case 'incorrect_cvc':
						$location = 'credit_card_cvc';
						break;
				}
				// Card has been declined. Add an error to $ninja_forms_processing
				$ninja_forms_processing->add_error( 'card_declined', __( $message, 'ninja-forms-stripe' ), $location );
			} catch ( Stripe_InvalidRequestError $e ) {
				$ninja_forms_processing->add_error( 'invalid_token', __( 'Invalid Stripe token.', 'ninja-forms-stripe' ) );
			}
		}
	}

	/*
	 * Adds the stripe charge id to our submission
	 *
	 * @since 1.0
	 * @return array $args
	 */

	public function add_charge_id( $args ) {
		if ( nf_st_pre_27() ) {
			$args['stripe_charge_id'] = $this->charge_id;
			return $args;
		} else {
			Ninja_Forms()->sub( $args )->add_meta( '_stripe_charge_id', $this->charge_id );
		}
	}

	/*
	 * Gets the description from our form fields.
	 *
	 * @since 1.0
	 * @return string $description
	 */

	private function get_description() {
		global $ninja_forms_processing;

		$total = nf_stripe_get_total();

		$description = $ninja_forms_processing->get_form_setting( 'stripe_desc' );
		if ( is_array( $total ) and isset ( $total['fields'] ) ) {
			$x = 0;
			foreach( $total['fields'] as $field_id => $calc_value ) {
				if ( $calc_value ) {

					$stripe_item = $ninja_forms_processing->get_field_setting( $field_id, 'stripe_item' );
					$label = $ninja_forms_processing->get_field_setting( $field_id, 'label' );

					if ( $stripe_item == 1 ) {
						if ( $description != '' ) {
							$description .= ', ';
						}
						if ( $ninja_forms_processing->get_field_setting( $field_id, 'list_label_desc' ) == 1 ) {
							$list = $ninja_forms_processing->get_field_setting( $field_id, 'list' );
							$show_values = $ninja_forms_processing->get_field_setting( $field_id, 'list_show_value' );
							$user_value = $ninja_forms_processing->get_field_value( $field_id );
							if ( isset ( $list['options'] ) ) {

								$list_label = '';
								foreach ( $list['options'] as $option ) {
									if ( $show_values == 1 ) {
										$value = $option['value'];
									} else {
										$value = $option['label'];
									}

									if ( $value == $user_value ) {
										if ( $list_label != '' ) {
											$list_label .= ', ';
										}
										$list_label .= $option['label'];
									}
								}
							}
							$label = $list_label;
						}

						$description .= $label;
					}
				}
			}
		}

		return $description;
	}

	/*
	 *
	 * Function that gets the $purchase_total of our form.
	 *
	 * @since 1.0
	 * @return string $purchase_total
	 */

	public function get_purchase_total() {
		// Get our form total. This can be returned as an array or a string value.
		$total = nf_stripe_get_total();

		if ( is_array ( $total ) ) { // If this is an array, grab the string total.
			if ( isset ( $total['total'] ) ) {
			  $purchase_total = $total['total'];
			} else {
			  $purchase_total = '';
			}
		} else { // This isn't an array, so $purchase_total can just be set to the string value.
			$purchase_total = $total;
		}
		return $purchase_total;
	}

} // End Class

function nf_stripe_processing() {
	$NF_Stripe_Processing = new NF_Stripe_Processing();
}

add_action( 'ninja_forms_process', 'nf_stripe_processing', 9999 );