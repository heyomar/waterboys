<?php

/*
 * Get a an array of currencies.
 *
 * @since 1.0
 * @return array $currencies
 */

function nf_stripe_get_currencies() {
    $currencies = array(
      array( 'name' => __( 'Australian Dollars', 'ninja-forms-stripe' ),   'value' => 'AUD' ),
      array( 'name' => __( 'Canadian Dollars', 'ninja-forms-stripe' ),     'value' => 'CAD' ),
      array( 'name' => __( 'Czech Koruna', 'ninja-forms-stripe' ),         'value' => 'CZK' ),
      array( 'name' => __( 'Danish Krone', 'ninja-forms-stripe' ),         'value' => 'DKK' ),
      array( 'name' => __( 'Euros', 'ninja-forms-stripe' ),                'value' => 'EUR' ),
      array( 'name' => __( 'Hong Kong Dollars', 'ninja-forms-stripe' ),    'value' => 'HKD' ),
      array( 'name' => __( 'Hungarian Forints', 'ninja-forms-stripe' ),    'value' => 'HUF' ),
      array( 'name' => __( 'Israeli New Sheqels', 'ninja-forms-stripe' ),  'value' => 'ILS' ),
      array( 'name' => __( 'Japanese Yen', 'ninja-forms-stripe' ),         'value' => 'JPY' ),
      array( 'name' => __( 'Mexican Pesos', 'ninja-forms-stripe' ),        'value' => 'MXN' ),
      array( 'name' => __( 'Norwegian Krone', 'ninja-forms-stripe' ),      'value' => 'NOK' ),
      array( 'name' => __( 'New Zealand Dollars', 'ninja-forms-stripe' ),  'value' => 'NZD' ),
      array( 'name' => __( 'Philippine Pesos', 'ninja-forms-stripe' ),     'value' => 'PHP' ),
      array( 'name' => __( 'Polish Zloty', 'ninja-forms-stripe' ),         'value' => 'PLN' ),
      array( 'name' => __( 'Pound Sterling', 'ninja-forms-stripe' ),       'value' => 'GBP' ),
      array( 'name' => __( 'Singapore Dollars', 'ninja-forms-stripe' ),    'value' => 'SGD' ),
      array( 'name' => __( 'Swedish Krona', 'ninja-forms-stripe' ),        'value' => 'SEK' ),
      array( 'name' => __( 'Swiss Franc', 'ninja-forms-stripe' ),          'value' => 'CHF' ),
      array( 'name' => __( 'Taiwan New Dollars', 'ninja-forms-stripe' ),   'value' => 'TWD' ),
      array( 'name' => __( 'Thai Baht', 'ninja-forms-stripe' ),            'value' => 'THB' ),
      array( 'name' => __( 'U.S. Dollars', 'ninja-forms-stripe' ),         'value' => 'USD' ),
    );

  return apply_filters( 'nf_stripe_currencies', $currencies );
}

/*
 * Get the current currency
 *
 * @since 1.0
 * @return string $currency
 */

function nf_stripe_get_currency(){
  $plugin_settings = get_option( 'ninja_forms_stripe' );

  if ( isset ( $plugin_settings['currency'] ) ) {
    $currency = $plugin_settings['currency'];
  } else {
    $currency = 'USD';
  }

  return $currency;
}

/*
 * Get the current total. Checks for a default total if there isn't a total field in the form
 *
 * @since 1.0
 * @return array $total
 */

function nf_stripe_get_total(){
  global $ninja_forms_processing;
  $total = $ninja_forms_processing->get_calc_total();

  if ( !$total ) {
    $total = $ninja_forms_processing->get_form_setting( 'stripe_default_total' );
  }
  
  return $total;
}