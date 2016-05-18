<?php
/**
 * wysiwyg.php
 *
 * wysiwyg.php contains addons and customizations to the MCE editor in the
 * WordPress backend.
 *
 * @package Offset
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.7.0
 */

/**
 * Conditional function to tell if a page is or is a child of a particular ID
 *
 * @since 0.7.0
 */
function is_tree($pid)
{
  global $post;
  if( is_page() && ($post->post_parent==$pid || is_page($pid)) )
    return true;
  else
    return false;
}

// Navigation
register_nav_menus(array(
    'footer' => __('Footer Menu'),
    'footer-bottom' => __('Footer Links')
));

/**
 * Rename "Posts" to "Press"
 *
 * @link http://new2wp.com/snippet/change-wordpress-posts-post-type-Press/
 */
add_action( 'admin_menu', 'pilau_change_post_menu_label' );
add_action( 'init', 'pilau_change_post_object_label' );
function pilau_change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Press';
	$submenu['edit.php'][5][0] = 'Press';
	$submenu['edit.php'][10][0] = 'Add Press';
	$submenu['edit.php'][16][0] = 'Press Tags';
	echo '';
}
function pilau_change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Press';
	$labels->singular_name = 'Press';
	$labels->add_new = 'Add Press';
	$labels->add_new_item = 'Add Press';
	$labels->edit_item = 'Edit Press';
	$labels->new_item = 'Press';
	$labels->view_item = 'View Press';
	$labels->search_items = 'Search Press';
	$labels->not_found = 'No Press found';
	$labels->not_found_in_trash = 'No Press found in Trash';
}
