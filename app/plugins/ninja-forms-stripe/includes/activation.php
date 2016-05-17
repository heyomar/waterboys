<?php

/*
 * Activation function
 *
 * @since 1.0
 * @return void
 */

function nf_stripe_activation() {
	if ( nf_st_pre_27() ) {
		global $wpdb;
		if($wpdb->get_var( "SHOW COLUMNS FROM ".NINJA_FORMS_SUBS_TABLE_NAME." LIKE 'stripe_charge_id'" ) != 'stripe_charge_id' ) {
			$sql = "ALTER TABLE ".NINJA_FORMS_SUBS_TABLE_NAME." ADD `stripe_charge_id` VARCHAR(255) NULL";
			$wpdb->query($sql);		
		}		
	}
}