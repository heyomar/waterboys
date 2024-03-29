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

		<script>
    (function(i,s,o,g,r,a,m){i[‘GoogleAnalyticsObject’]=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script’,’https://www.google-analytics.com/analytics.js’,'ga’);
    ga('create’, 'UA-86268952-1', 'auto’);
    ga('send’, 'pageview’);
    </script>
  </head>
  <body <?php body_class(); ?>>
    <?php get_template_part('components/svg') ?>
    <header role="banner" class="site__header">
      <div class="site__header__content">
          <a href="/"><img class="wb__header-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-logo.png" alt="" /></a>
        <div class="wb__header__right">
          <a class="wb__button wb__header-button" href="/donate">Donate</a>
          <div id="hamburger" class="menu-handle">
            <span>
							<svg id="open-svg" class="menu-icon-svg wb__header__hamburger active">
              	<use xlink:href="#icon-menu-open"></use>
            	</svg>
						</span>

						<span>
							<svg id="close-svg" class="menu-icon-svg wb__header__hamburger inactive">
              	<use xlink:href="#icon-menu-close"></use>
            	</svg>
						</span>
          </div>
        </div>
      </div>
      <nav id="main-nav" class="wb__header__nav">
        <div class="wb__nav__ctn">
          <div class="wb__nav__ctn-item nav-item-ourmission"><a class="textured" href="/mission/">Our Mission</a></div>
          <div class="wb__nav__ctn-item nav-item-donate"><a class="textured" href="/donate/">Donate</a></div>
          <div class="wb__nav__ctn-item nav-item-initiatives"><a class="textured" href="/kili/">Conquering Kili</a></div>
          <div class="wb__nav__ctn-item nav-item-waterboys"><a class="textured" href="/roster/">The Waterboys Roster</a></div>
          <div class="wb__nav__ctn-item nav-item-social"><a class="textured" href="/connect/">Connect</a></div>
        </div>
      </nav>
    </header>

    <main>
