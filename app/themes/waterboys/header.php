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
    <!-- <title><?php wp_title('|', true, 'right') . bloginfo('name'); ?></title> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <script src="https://use.typekit.net/wmb3pty.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
  </head>

  <body <?php body_class(); ?>>
    <?php get_template_part('components/svg') ?>
    <header role="banner" class="site__header">
      <div class="site__header__content">
          <a href="/"><img class="wb__header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-logo.png" alt="" /></a>
        <div class="wb__header__right">
          <a class="wb__button wb__header-button" href="/donate">Donate</a>
          <span id="hamburger">
            <svg class="menu-icon-svg wb__header__hamburger">
              <use xlink:href="#icon-menu-open"></use>
            </svg>
          </span>
        </div>
      </div>
      <nav id="main-nav" class="wb__header__nav">
        <div class="wb__nav__ctn">
          <div class="wb__nav__ctn-item nav-item-ourmission"><a href="/mission/">Our Mission</a></div>
          <div class="wb__nav__ctn-item nav-item-donate"><a href="/donate/">Donate</a></div>
          <div class="wb__nav__ctn-item nav-item-initiatives"><a href="/conquering-kili">Conquering Kili</a></div>
          <div class="wb__nav__ctn-item nav-item-waterboys"><a href="/roster/">The Waterboys Roster</a></div>
          <div class="wb__nav__ctn-item nav-item-social"><a href="/connect/">Connect</a></div>
        </div>
      </nav>
    </header>

    <main>
