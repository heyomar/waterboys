<?php /*
Template Name: Group Profile
*/ ?>

  <?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="wb__page-hero gp__page-hero">
        <div class="gp__page-hero-ctn">
              <div class="gp__page-hero-inner-ctn">
                <div class="gp__flex-profile-image">
                  <img class="gp__profile-image" src="<?php the_post_thumbnail_url(); ?>" />
                </div>
                <div class="gp__wave-ctn">
                  <img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-wave.png" alt="">
                </div>
                <div class="gp__flex-group-title">
                  <span class="gp__title ">
                    <?php the_field('group_name'); ?>
                  </span>
                </div>
              </div>
        </div>
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
            <div class="dash__goal"><?php echo the_field('register_group_fundraising_goal') ?></div>
          </div>
          <div class="wb__page-dash-item">
            <h3>Progress to Goal</h3>
            <div class="wb__progressgoal-ctn">
              <div class="wb__progressgoal-bar"></div>
            </div>
            <p class="wb__progressgoal-amount">
                <?php echo $donationTotal ?>
            </p>
          </div>
          <?php $player = get_field('affiliated_player'); ?>
          <div class="wb__page-dash-item">
            <div class="wb__dash-donate">
              <a class="wb__button" href="/donate/?plyr=<?php the_field('register_group_team_to_support'); ?>&grp=<?php the_ID() ?>">
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
              <?php the_field('register_group_city'); ?>,&nbsp;<?php the_field('register_group_state'); ?>
            </p>
            <p class="wb__player__content__title wb__player__bio-title">
              Group Contact
            </p>
            <p class="wb__player__content__body">
              <?php the_field('group_contact_first_name'); ?>&nbsp;<?php the_field('group_contact_last_name');  ?>
            </p>
          </div>
        </div>

        <div class="wb__player-content wb__content-info">
          <p class="wb__player__content__info-position wb__player__content__title wb__player__info-title">
            About Waterboys
          </p>
          <p class="sidebar-body">
            Waterboys unites players and fans from across the NFL to bring life-sustaining well water to East African communities in need. We provide clean, safe and sustainable water access by hiring local crews to drill deep-bore wells serving up to 7,500 people. At a cost of $45,000 per well, every drop counts.
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
