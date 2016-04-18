<?php
/**
 * header.php
 *
 * Site header
 *
 * @package Offset\Templates
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right') . bloginfo('name'); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <script src="https://use.typekit.net/wmb3pty.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
  </head>

  <body <?php body_class(); ?>>

    <header role="banner" class="site__header">
      <div class="site__header__content">
          <a href="/"><img class="wb__header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-logo.png" alt="" /></a>
        <div class="wb__header__right">
          <a class="wb__button wb__header-button" href="/">Donate</a>
          <a href="/"><img class="wb__header__hamburger" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-waves.png" alt="" /></a>
        </div>
      </div>
      <nav class="wb__header__nav">
          <?php
          $args = array(
              'theme_location' => 'primary'
          );
           ?>
          <?php wp_nav_menu($args); ?>
      </nav>
    </header>

    <main>
