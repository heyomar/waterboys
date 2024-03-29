<?php /*
Template Name: Player Profile
*/ ?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div style="background: url('<?php the_field('desktop_header'); ?>') top center no-repeat; background-size: cover;" class="wb__player__header">
        <div class="wb__player-name-ctn"><h2 class="wb__player-name textured"><?php the_field('player_name'); ?></h2>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-wave.png" alt="" />
        <p class="wb__player-team"><?php the_field('team'); ?></p></div>


    </div>
    <div class="wb__page-dash-ctn">
      <div class="wb__page-dash-inner-ctn">
        <?php
          global $wpdb;
          $playerid = get_the_ID();
          $donations = $wpdb->get_results("SELECT donation FROM wp_donations WHERE plyr_id = $playerid");
          $donationTotal = 0;
          foreach ($donations as $donation) {
            $donationTotal += (int)$donation->donation;
          }
          $donationTotal = ceil($donationTotal/100);
        ?>
        <div class="wb__page-dash-item">
          <h3>Fundraising Goal</h3>
          <div class="dash__goal">$<span><?php echo number_format(get_field('fundraising_goal')); ?></span></div>
        </div>
        <div class="wb__page-dash-item">
          <h3>Progress to Goal</h3>
          <div class="wb__progressgoal-ctn">
            <div id="progressbar" class="wb__progressgoal-bar"></div>
          </div>
          <p class="dash__progress wb__progressgoal-amount">$
          <span><?php echo number_format($donationTotal); ?></span>
          </p>
        </div>
        <div class="wb__page-dash-item">
          <div class="wb__dash-donate"><a class="wb__button" href="/donate/?plyr=<?php the_ID(); ?>">Donate Now</a></div>
        </div>
      </div>
    </div>

      <div class="wb__player-container">
          <div class="wb__player-content wb__content-bio">
              <div class="wb__player__content-career">
                <p class="wb__player__content__title wb__player__bio-title">Waterboy Bio</p>
                <p class="wb__player__content__body"><?php the_field('bio_body'); ?></p>
              </div>
          </div>
          <div class="wb__player-content wb__content-info">
            <span class="wb__player__content__info-position wb__player__content__title wb__player__info-title">Position</span>
              <p><?php the_field('position'); ?></p>
            <span class="wb__player__content__info-college wb__player__content__title wb__player__info-title">College</span>
              <p><?php the_field('college'); ?></p>
            <span class="wb__player__content__info-careerhighlights wb__player__content__title wb__player__info-title">Career Highlights</span>
            <?php
            if( have_rows('career_highlights') ): ?>
                <ul class="wb__player__career-ul">
                <?php while ( have_rows('career_highlights') ) : the_row(); ?>
                    <li><?php the_sub_field('highlight');?></li>
                <?php endwhile;?>
                </ul>
            <?php endif ?>
          </div>
      </div>
      <div class="wb__player-viewall">
          <a class="wb__button" href="/roster">View All Players</a>
      </div>
<?php endwhile; ?>
<?php endif ?>
<?php get_footer(); ?>
