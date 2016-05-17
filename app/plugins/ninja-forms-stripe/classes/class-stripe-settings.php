<?php

/*
 *
 * This class sets up all of our Stripe settings in the wp-admin.
 *
 * @since 1.0
 */

class NF_Stripe_Settings 
{
    /**
   * Initialize the plugin
   */
  public function __construct() { 
    // load scripts
    //add_action( 'ninja_forms_display_js', array( &$this, "load_scripts" ) );

    // load settings
    add_action( 'admin_menu', array( $this, 'load_stripe_settings' ) );
    add_action( 'admin_init', array( $this, 'load_stripe_form_settings' ) );
    add_action( 'ninja_forms_edit_field_after_registered', array( $this, 'load_stripe_field_settings' ), 12 );
  }

  public function load_stripe_settings() {
    // Add a submenu to Ninja Forms for Stripe settings.
    $stripe = add_submenu_page( 'ninja-forms', __( 'Stripe Settings', 'ninja-forms-stripe' ), __( 'Stripe', 'ninja-forms-stripe' ), 'administrator', 'ninja-forms-stripe', 'ninja_forms_admin' );

    // Enqueue default Ninja Forms admin styles and JS.
    add_action('admin_print_styles-' . $stripe, 'ninja_forms_admin_css');
    add_action('admin_print_styles-' . $stripe, 'ninja_forms_admin_js');

    // Register a tab to our new page for Stripe settings.
    $args = array(
      'name' => __( 'Stripe Settings', 'ninja-forms-stripe' ),
      'page' => 'ninja-forms-stripe',
      'display_function' => '',
      'save_function' => array( $this, 'save_stripe_settings' ),
      'tab_reload' => true,
    );
    if ( function_exists( 'ninja_Forms_register_tab' ) ) {
      ninja_forms_register_tab( 'general_settings', $args);
    }

    // Grab our current settings.
    $plugin_settings = get_option( 'ninja_forms_stripe' );
    
    if ( isset ( $plugin_settings['test_mode'] ) ) {
      $test_mode = $plugin_settings['test_mode'];
    } else {
      $test_mode = '';
    }

    if ( isset ( $plugin_settings['live_secret_key'] ) ) {
      $live_secret_key = $plugin_settings['live_secret_key'];
    } else { 
      $live_secret_key = '';
    }

    if ( isset ( $plugin_settings['live_publishable_key'] ) ) {
      $live_publishable_key = $plugin_settings['live_publishable_key'];
    } else {
      $live_publishable_key = '';
    }

    if ( isset ( $plugin_settings['test_secret_key'] ) ) {
      $test_secret_key = $plugin_settings['test_secret_key'];
    } else {
      $test_secret_key = '';
    }

    if ( isset ( $plugin_settings['test_publishable_key'] ) ) {
      $test_publishable_key = $plugin_settings['test_publishable_key'];
    } else {
      $test_publishable_key = '';
    }

    if ( isset ( $plugin_settings['currency'] ) ) {
      $currency = $plugin_settings['currency'];
    } else {
      $currency = 'USD';
    }

    // Register our General Settings metabox.
    $args = array(
      'page' => 'ninja-forms-stripe',
      'tab' => 'general_settings',
      'slug' => 'general_settings',
      'title' => __( 'Basic Settings', 'ninja-forms-stripe' ),
      'display_function' => '',
      'state' => 'open',
      'settings' => array(
        array(
          'name' => 'currency',
          'type' => 'select',
          'label' => __( 'Currency', 'ninja-forms-stripe' ),
          'options' => nf_stripe_get_currencies(),
          'default_value' => $currency,
        ),
      ),
    );
    if ( function_exists( 'ninja_forms_register_tab_metabox' ) ) {
      ninja_forms_register_tab_metabox($args);
    }

    // Register our API Settings metabox.
    $args = array(
      'page' => 'ninja-forms-stripe',
      'tab' => 'general_settings',
      'slug' => 'credentials',
      'title' => __( 'API Credentials', 'ninja-forms-stripe' ),
      'display_function' => '',
      'state' => 'open',
      'settings' => array(
        array(
          'name' => 'test_secret_key',
          'type' => 'text',
          'label' => __( 'Test Secret Key', 'ninja-forms-stripe' ),
          'default_value' => $test_secret_key,
        ),        
        array(
          'name' => 'test_publishable_key',
          'type' => 'text',
          'label' => __( 'Test Publishable Key', 'ninja-forms-stripe' ),
          'default_value' => $test_publishable_key,
        ),
        array(
            'name' => 'live_secret_key',
            'type' => 'text',
            'label' => __( 'Live Secret Key', 'ninja-forms-stripe' ),
            'default_value' => $live_secret_key,
        ),
        array(
            'name' => 'live_publishable_key',
            'type' => 'text',
            'label' => __( 'Live Publishable Key', 'ninja-forms-stripe' ),
            'default_value' => $live_publishable_key,
        ),
      ),
    );
    if ( function_exists( 'ninja_forms_register_tab_metabox' ) ) {
      ninja_forms_register_tab_metabox($args);
    }

  }

  public function save_stripe_settings( $data ) {
    $plugin_settings = get_option( 'ninja_forms_stripe' );
    if ( is_array( $data ) ) {
      foreach ( $data as $key => $val ) {
        $plugin_settings[$key] = $val;
      }
    }
    update_option( 'ninja_forms_stripe', $plugin_settings );

    return __( 'Settings Updated', 'ninja-forms-stripe' );
  }

  public function load_stripe_form_settings() {
    // Register our Stripe Settings metabox.
    $args = array(
      'page' => 'ninja-forms',
      'tab' => 'form_settings',
      'slug' => 'stripe',
      'title' => __( 'Stripe Settings', 'ninja-forms-stripe' ),
      'display_function' => '',
      'state' => 'closed',
      'settings' => array(
        array(
          'name' => 'stripe',
          'type' => 'checkbox',
          'label' => __( 'Use Stripe', 'ninja-forms-stripe' ),
        ),
        array(
          'name' => 'stripe_test_mode',
          'type' => 'checkbox',
          'label' => __( 'Run in sandbox (test) mode', 'ninja-forms-stripe'),
        ),  
        array(
          'name' => 'stripe_desc',
          'type' => 'text',
          'label' => __( 'Default Product Description', 'ninja-forms-stripe' ),
          'desc' => __( 'If you do not plan on adding any calculation fields to your form, enter a product description here.', 'ninja-forms-stripe' ),
        ),
        array(
          'name' => 'stripe_default_total',
          'type' => 'text',
          'label' => __( 'Default Total', 'ninja-forms-stripe' ),
          'desc' => __( 'If you do not want to use a Total Field in your form, you can use this setting. Please leave out any currency markers.', 'ninja-forms-stripe' ),
        ),
        array(
          'name' => 'stripe_recurring_plan',
          'type' => 'text',
          'label' => __( 'Recurring Payment Plan ID', 'ninja-forms-stripe' ),
          'desc' => __( '<strong>If you do not want to create a recurring payment, leave this field blank.</strong><p><em>If you would like to sign users up for a recurring payment plan using this form, enter the ID of that plan here. You can create a recurring payment plan from your dashboard at Stripe.com.</em></p>', 'ninja-forms-stripe' ),
        ),
      ),
    );
    if ( function_exists( 'ninja_forms_register_tab_metabox' ) ) {
      ninja_forms_register_tab_metabox($args);
    }
  }

  public function load_stripe_field_settings( $field_id ) {
    global $ninja_forms_fields;

    // Output our edit field settings
    $field = ninja_forms_get_field_by_id( $field_id );

    $field_type = $field['type'];
    if ( isset ( $ninja_forms_fields[ $field_type ]['process_field'] ) && ! $ninja_forms_fields[ $field_type ]['process_field'] )
      return false;

    if ( isset ( $field['data']['stripe_item'] ) ) {
      $stripe_item = $field['data']['stripe_item'];
    } else {
      $stripe_item = 0;
    }

   ?>
      <div id="stripe_settings">
        <h4>Stripe Settings</h4>
        <?php

        ninja_forms_edit_field_el_output( $field_id, 'checkbox', __( 'Include this label in the product description list sent to Stripe.', 'ninja-forms-stripe' ), 'stripe_item', $stripe_item, 'wide', '', '' );
        // If we're working with a list, add the checkbox option to use the List Item Label for the Stripe Product Name.
        if ( $field['type'] == '_list' ) {
      
          if ( isset ( $field['data']['list_label_desc'] ) ) {
            $list_label_desc = $field['data']['list_label_desc'];
          } else {
            $list_label_desc = 0;
          }
          
          ninja_forms_edit_field_el_output( $field_id, 'checkbox', __( 'Use list label for Stripe description', 'ninja-forms-stripe' ), 'list_label_desc', $list_label_desc, 'wide', '', '' );
        }

          ?>

      </div>
      <?php
  }

} // Class

function ninja_forms_stripe_initiate(){
  if ( is_admin() ) {
    $NF_Stripe_Settings = new NF_Stripe_Settings();     
  }
}

add_action( 'init', 'ninja_forms_stripe_initiate' );