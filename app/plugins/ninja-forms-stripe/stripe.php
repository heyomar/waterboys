<?php
/*
Plugin Name: Ninja Forms - Stripe
Plugin URI: http://ninjaforms.com/downloads/stripe
Description: Allows for integration with the Stripe payment gateway.
Version: 1.0.10
Author: The WP Ninjas
Author URI: http://ninjaforms.com
Text Domain: ninja-forms-stripe
Domain Path: /lang/

Copyright 2014 WP Ninjas.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

define( 'NF_STRIPE_DIR', plugin_dir_path( __FILE__ ) );
define( 'NF_STRIPE_URL', plugins_url().'/'.basename( dirname( __FILE__ ) ) );
define( 'NF_STRIPE_VERSION', '1.0.10' );
define( 'NF_STRIPE_DEBUG', false );

function nf_stripe_setup_license() {
  if ( class_exists( 'NF_Extension_Updater' ) ) {
    $NF_Extension_Updater = new NF_Extension_Updater( 'Stripe', NF_STRIPE_VERSION, 'WP Ninjas', __FILE__ );
  }
}

add_action( 'admin_init', 'nf_stripe_setup_license' );

if ( is_admin() ) {

  // Register our activation hook.
  require_once( NF_STRIPE_DIR .'includes/activation.php' );
  register_activation_hook( __FILE__, 'nf_stripe_activation' );

  // Register our admin settings pages.
  require_once( NF_STRIPE_DIR .'classes/class-stripe-settings.php' );
  // Register our submissions filters.
  require_once( NF_STRIPE_DIR . 'classes/class-stripe-subs.php' );
  require_once( NF_STRIPE_DIR . 'classes/deprecated-class-stripe-subs.php' );

} else {
  // Include our front-end JS scripts.
  require_once( NF_STRIPE_DIR . 'includes/scripts.php' );
}

// Include our front-end processing class.
require_once( NF_STRIPE_DIR . 'classes/class-stripe-process.php' );

require_once( NF_STRIPE_DIR . 'includes/functions.php' );
require_once( NF_STRIPE_DIR . 'includes/shortcodes.php' );

// Enable our credit card field
function nf_stripe_enable_cc() {
  return true;
}

add_filter( 'ninja_forms_enable_credit_card_field', 'nf_stripe_enable_cc' );

/**
 * Load translations for add-on.
 * First, look in WP_LANG_DIR subfolder, then fallback to add-on plugin folder.
 */
function ninja_forms_stripe_load_translations() {

  /** Set our unique textdomain string */
  $textdomain = 'ninja-forms-stripe';

  /** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
  $locale = apply_filters( 'plugin_locale', get_locale(), $textdomain );

  /** Set filter for WordPress languages directory */
  $wp_lang_dir = apply_filters(
    'ninja_forms_stripe_wp_lang_dir',
    trailingslashit( WP_LANG_DIR ) . 'ninja-forms-stripe/' . $textdomain . '-' . $locale . '.mo'
  );

  /** Translations: First, look in WordPress' "languages" folder = custom & update-secure! */
  load_textdomain( $textdomain, $wp_lang_dir );

  /** Translations: Secondly, look in plugin's "lang" folder = default */
  $plugin_dir = trailingslashit( basename( dirname( __FILE__ ) ) );
  $lang_dir = apply_filters( 'ninja_forms_stripe_lang_dir', $plugin_dir . 'lang/' );
  load_plugin_textdomain( $textdomain, FALSE, $lang_dir );

}
add_action( 'plugins_loaded', 'ninja_forms_stripe_load_translations' );

function nf_st_pre_27() {
  if ( defined( 'NINJA_FORMS_VERSION' ) ) {
    if ( version_compare( NINJA_FORMS_VERSION, '2.7' ) == -1 ) {
      return true;
    } else {
      return false;
    }
  } else {
    return null;
  }
}
