<?php

function ninja_forms_stripe_charge_id_shortcode( $atts ){
	global $ninja_forms_processing;
	
	$sub_id = $ninja_forms_processing->get_form_setting( 'sub_id' );

	return Ninja_Forms()->sub( $sub_id )->get_meta( '_stripe_charge_id' );

}

add_shortcode( 'nf_stripe_charge_id', 'ninja_forms_stripe_charge_id_shortcode' );