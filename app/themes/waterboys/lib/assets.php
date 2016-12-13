<?php
/**
 * scripts.php
 *
 * Loads scripts and styles
 *
 * @package Offset\Assets
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.1.0
 */

function offset_load_assets()
{
  // refers to dev stylesheet, rename reference to .min.css for production
  wp_enqueue_style( 'master', get_stylesheet_directory_uri() . '/styles/bundle.css', false );

  wp_register_script( 'footer_scripts', get_stylesheet_directory_uri() . '/scripts/bundle.js', array('jquery'), false, true );
  wp_register_script( 'lity', get_stylesheet_directory_uri() . '/scripts/vendor/lity.js', array('jquery'), false, true);
  wp_register_script( 'slick', get_stylesheet_directory_uri() . '/scripts/vendor/slick.js', array('jquery'), false, true);
  wp_register_script( 'fitVids', get_stylesheet_directory_uri() . '/scripts/vendor/fitvids.js', array('jquery'), false, true);
  wp_register_script( 'tablesort', get_stylesheet_directory_uri() . '/scripts/vendor/jquery.tablesorter.js', array('jquery'), false, true);

  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'lity' );
  wp_enqueue_script( 'slick' );
  wp_enqueue_script( 'fitVids' );
	wp_enqueue_script( 'tablesort' );
  wp_enqueue_script( 'footer_scripts' );
}
add_action( 'wp_enqueue_scripts', 'offset_load_assets' );
