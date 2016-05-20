<?php /*
Template Name: Group Profile
*/ ?>

  <?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="wb__page-hero gp__page-hero">
        <div class="gp__page-hero-inner-ctn">
          <?php if( get_field('profile_image') ): ?><img class="gp__profile-image" src="<?php the_field('profile_image'); ?>" />
            <?php endif; ?>
              <h2 class="st__title ">
      <?php the_field('group_name'); ?><br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2></div>
      </div>
      <div class="wb__page-dash-ctn">
        <div class="wb__page-dash-inner-ctn">
          <div class="wb__page-dash-item">
            <h3>Fundraising Goal</h3>
          </div>
          <div class="wb__page-dash-item">
            <h3>Progress to Goal</h3>
          </div>
          <div class="wb__page-dash-item">
            <div class="wb__dash-donate"><a class="wb__button" href="/">Donate Now</a></div>
          </div>
        </div>
      </div>


      <div class="wb__player-container">
        <div class="wb__player-content wb__content-bio">
          <div class="wb__player__content-career">
            <p class="wb__player__content__title wb__player__bio-title">
              <?php the_field('bio_title'); ?>
            </p>
            <p class="wb__player__content__body">
              <?php the_field('bio_body'); ?>
            </p>
            <p class="wb__player__content__title wb__player__bio-title">
              <?php the_field('location_title'); ?>
            </p>
            <p class="wb__player__content__body">
              <?php the_field('location_body'); ?>
            </p>
            <p class="wb__player__content__title wb__player__bio-title">
              <?php the_field('contact_title'); ?>
            </p>
            <p class="wb__player__content__body">
              <?php the_field('contact_body'); ?>
            </p>
          </div>
        </div>
        <div class="wb__player-content wb__content-info">
          <p class="wb__player__content__info-position wb__player__content__title wb__player__info-title">
            <?php the_field('about_waterboys_title'); ?>
          </p>
          <p>
            <?php the_field('about_waterboys_body'); ?>
          </p>

        </div>
      </div>
      <div class="wb__mission-socialbar-ctn">
        <p class="socialbar-copy">Share this page.</p>
        <div class="socialbar-buttons-ctn">
          <a href="" class="socialbar-button">
            <svg class="icon icon-twitter">
              <use xlink:href="#icon-twitter"></use>
            </svg> Tweet</a>
          <a href="" class="socialbar-button">
            <svg class="icon icon-facebook-square">
              <use xlink:href="#icon-facebook-square"></use>
            </svg> Share</a>
        </div>
      </div>
      <?php endwhile; ?>
        <?php endif ?>
          <?php get_footer(); ?>
