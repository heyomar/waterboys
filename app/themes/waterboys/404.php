<?php
/**
 * 404.php
 *
 * 404 WordPress page
 *
 * @package Offset\Templates
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.1.0
 */
?>

<?php get_header(); ?>
<div class="wb__page-hero legal__hero-bg">
	<h2 class="st__title">Fumble<br>
	<img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt="">
	</h2>
</div>

<div class="error404page">
	<h3>This page doesn't exist. Recover <a href="/">here</a >.</h3>
	<p class="copy">404 Error: Page Not Found</p>
</div>

		<div class="cta">
			<p>Bring it in. Connect with us on social.</p>
			<div class="share">
				<a target="_blank" href="http://twitter.com/intent/tweet?text=I+just+teamed+up+to+tackle+thirst+with+@WaterboysORG.+Help+your+favorite+%23NFL+team+dig+deep+and+change+lives:" target="_blank" class="socialbar-button wb__button">
					<svg class="icon icon-twitter">
						<use xlink:href="#icon-twitter"></use>
					</svg> Tweet</a>
					<span class="space"></span>
				<a target="_blank" href="https://www.facebook.com/waterboysorg" target="_blank" class="socialbar-button wb__button">
					<svg class="icon icon-facebook-square">
						<use xlink:href="#icon-facebook-square"></use>
					</svg> Share</a>
			</div>
		</div>


<?php get_footer(); ?>
