<?php

/*
 * Add our javascript files if this form is set to use stripe.
 *
 * @since 1.0
 * @return void
 */

function nf_stripe_display_scripts( $form_id ) {
	global $ninja_forms_loading, $ninja_forms_processing;

	// get our stripe plugin settings
	$stripe_options = get_option( 'ninja_forms_stripe' );
	$stripe = 0;
	if ( isset ( $ninja_forms_loading ) ) {
		if ( $ninja_forms_loading->get_form_setting( 'stripe' ) == 1 ) {
			$stripe = 1;
			$test_mode = $ninja_forms_loading->get_form_setting( 'stripe_test_mode' );
		}
	} else if ( isset ( $ninja_forms_processing ) ) {
		if ( $ninja_forms_processing->get_form_setting( 'stripe' ) == 1 ) {
			$stripe = 1;
			$test_mode = $ninja_forms_processing->get_form_setting( 'stripe_test_mode' );
		}
	}

	if ( $stripe == 1 ) {
		// check to see if we are in test mode
		if( $test_mode == 1 ) {
			$publishable = $stripe_options['test_publishable_key'];
		} else {
			$publishable = $stripe_options['live_publishable_key'];
		}
		// Add our JS
		wp_enqueue_script( 'stripe', 'https://js.stripe.com/v1/', array( 'jquery' ) );
		if ( defined( 'NINJA_FORMS_JS_DEBUG' ) && NINJA_FORMS_JS_DEBUG ) {
			$suffix = '';
			$src = 'dev';
		} else {
			$suffix = '.min';
			$src = 'min';
		}

		wp_enqueue_script( 'nf-stripe-processing',
			NF_STRIPE_URL . '/assets/js/' . $src .'/stripe-processing' . $suffix . '.js',
			array( 'jquery', 'ninja-forms-display' ) );
		
		wp_localize_script( 'nf-stripe-processing', 'stripe_vars', array(
			'publishable_key' => $publishable,
			)
		);
	}
}

add_action( 'ninja_forms_display_js', 'nf_stripe_display_scripts' );

function nf_stripe_form_js_settings( $settings, $form_id ) {
	global $ninja_forms_loading, $ninja_forms_processing;

	// get our stripe plugin settings
	$stripe_options = get_option( 'ninja_forms_stripe' );
	$stripe = 0;
	if ( isset ( $ninja_forms_loading ) ) {
		if ( $ninja_forms_loading->get_form_setting( 'stripe' ) == 1 ) {
			$stripe = 1;
		}
	} else if ( isset ( $ninja_forms_processing ) ) {
		if ( $ninja_forms_processing->get_form_setting( 'stripe' ) == 1 ) {
			$stripe = 1;
		}
	}

	$settings['stripe'] = $stripe;

	return $settings;
}

add_filter( 'nf_form_js_settings', 'nf_stripe_form_js_settings', 10, 2 );