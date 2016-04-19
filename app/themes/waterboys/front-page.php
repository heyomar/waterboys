<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="wb__home-container">
			<div class="wb__home-content">
		    <h1 class="wb__hero-title">
		        Team Up to <br> Tackle Thirst
		    <h2>
		    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-wave.png" alt="" />
		    <h3 class="wb__hero-subtitle">
		        Waterboys unites players and fans from across the NFL in support of one mission:<br>bringing life-sustaining well water to East African communities in need.
		    </h3>
		    <a class="wb__button wb__hero-button" href="/" >Watch &nbsp; &#9654;</a><br>
				<a class="wb__hero-missionlink" href="/">Our Mission</a>
			</div>
		</div>
<?php endwhile; ?>
<?php endif ?>

<?php get_footer(); ?>
