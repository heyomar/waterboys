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
      <div class="gp__page-dash-ctn">
        <div class="wb__page-dash-inner-ctn">
          <?php
            global $wpdb;
            $groupid = get_the_ID();
            $donations = $wpdb->get_results("SELECT donation FROM wp_donations WHERE grp_id = $groupid");
            $donationTotal = 0;
            foreach ($donations as $donation) {
              $donationTotal += (int)$donation->donation;
            }
            $donationTotal = ceil($donationTotal/100);
          ?>
          <div class="wb__page-dash-item">
            <h3>Fundraising Goal</h3>
            <div><?php echo $donationTotal; ?></div>
          </div>
          <div class="wb__page-dash-item">
            <h3>Progress to Goal</h3>
            <div class="wb__progressgoal-ctn">
              <div class="wb__progressgoal-bar"></div>
            </div>
            <p class="wb__progressgoal-amount">
              $12,255
            </p>
          </div>
          <?php $player = get_field('affiliated_player'); ?>
          <div class="wb__page-dash-item">
            <div class="wb__dash-donate">
              <a class="wb__button" href="/donate/?plyr=<?php the_ID(); ?>&grp=<?php echo $player[0]->ID; ?>">
                Donate Now
              </a>
            </div>
          </div>
        </div>
      </div>


      <div class="wb__player-container">
        <div class="wb__player-content wb__content-bio">
          <div class="wb__player__content-career">
            <p class="wb__player__content__title wb__player__bio-title">
              About The Group
            </p>
            <p class="wb__player__content__body">
              <?php the_field('bio_body'); ?>
            </p>
            <p class="wb__player__content__title wb__player__bio-title">
              Location
            </p>
            <p class="wb__player__content__body">
              <?php the_field('location_body'); ?>
            </p>
            <p class="wb__player__content__title wb__player__bio-title">
              Group Contact
            </p>
            <p class="wb__player__content__body">
              <?php the_field('contact_body'); ?>
            </p>
          </div>
        </div>
        <div class="wb__player-content wb__content-info">
          <p class="wb__player__content__info-position wb__player__content__title wb__player__info-title">
            About Waterboys
          </p>
          <p>
            <?php the_field('about_waterboys_body'); ?>
          </p>

        </div>
      </div>
      <div class="wb__mission-socialbar-ctn">
        <p class="socialbar-copy">Share this page.</p>
        <div class="socialbar-buttons-ctn">
          <a href="" class="socialbar-button wb__button">
            <svg class="icon icon-twitter">
              <use xlink:href="#icon-twitter"></use>
            </svg> Tweet</a>
          <a href="" class="socialbar-button wb__button">
            <svg class="icon icon-facebook-square">
              <use xlink:href="#icon-facebook-square"></use>
            </svg> Share</a>
        </div>
      </div>
      <?php endwhile; ?>
        <?php endif ?>
          <?php get_footer(); ?>
