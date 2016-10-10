<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
          $pd_query = "select * from wp_posts as p
          left join (select * from wp_postmeta where meta_key = 'team') as pm on p.ID = pm.post_id
          left join (select plyr_id, sum(donation) as total_donations from wp_donations group by plyr_id ) as t_donations on p.ID = t_donations.plyr_id
          where p.post_type='player' and p.post_status='publish'
          order by total_donations desc
          ;
          ;";
          $players_and_donations = $wpdb->get_results($pd_query);
          $donationTotals;
          ?>

    <!-- <?php foreach($players_and_donations as $player) { ?>
		<?php $donationTotals += $player->total_donations;?>
    <?php  } $amount = $donationTotals / 100?> -->

    <div class="wb__page-hero ms__hero-bg">
      <h2 class="mission__title"> Our Mission<br>
        <img class="mission__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png">
      </h2>
    </div>

    <div class="mission-ctn">
      <div class="mission-flex-ctn wb__mission-hero-copy">
        <p class="mission-flex-child copy__intro">
          <?php the_field('hero_sub_copy'); ?>
        </p>
      </div>
      <div class="mission-flex-ctn wb__mission-meter-ctn">
        <img class="mission-meter-img" src="<?php the_field('wells_graphic') ?>" alt="" />
        <div class="mission-flex-child wb__mission-meter">
          <p class="mission__meter-title">Progress To Next Well</p>
          <div style="background-color:#cccdcd;" class="wb__progressgoal-ctn">
                 <div style="width:25%;" id="missonProgress" class="wb__progressgoal-bar"></div>
          </div>
          <p class="ourmission__goal">Goal: $45,000</p>
        </div>
      </div>
      <div class="mission-flex-ctn">
        <p class="mission-flex-child meter-sub-copy copy__secondary">
          <?php the_field('meter_sub_copy'); ?>

        </p>
      </div>
      <div class="mission-flex-ctn">

        <div class="reasons-flex-child mission-reason">
          <div class="mission-inner-flex-ctn">
            <div class="mission-flex-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-education.png" alt="">
            </div>

            <div class="mission-flex-para">
                <h3 class="reasons__description-title">Education</h3> <br>
                <?php the_field('reasons_education_copy'); ?>
            </div>
          </div>
        </div>

        <div class="reasons-flex-child mission-reason">
          <div class="mission-inner-flex-ctn">
            <div class="mission-flex-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-agriculture.png" alt="">
            </div>

            <div class="mission-flex-para">
                <h3 class="reasons__description-title">Agriculture</h3> <br>
                <?php the_field('reasons_agriculture_copy'); ?>
            </div>
          </div>
        </div>


        <div class="reasons-flex-child mission-reason">
          <div class="mission-inner-flex-ctn">
            <div class="mission-flex-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-economy.png" alt="">
            </div>

            <div class="mission-flex-para">
                <h3 class="reasons__description-title">Economy</h3> <br>
                <?php the_field('reasons_economy_copy'); ?>
            </div>
          </div>
        </div>

        <div class="reasons-flex-child mission-reason">
          <div class="mission-inner-flex-ctn">
            <div class="mission-flex-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-health.png" alt="">
            </div>

            <div class="mission-flex-para">
                <h3 class="reasons__description-title">Health</h3> <br>
                <?php the_field('reasons_health_copy'); ?>
            </div>
          </div>
        </div>

        <p class="mission-flex-child reasons-sub-copy copy__secondary">
          <?php the_field('reasons_sub_copy'); ?>
        </p>
      </div>
    </div>
    <div id="wb__mission-video-ctn" class="wb__mission-video-ctn">
      <iframe src="https://www.youtube.com/embed/BzeEeXir1qU" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="mission-ctn">
      <div class="mission-flex-ctn wb__dig-deep-ctn">
        <h3 class="wb__dig-deep-title wb__red-sm-title">How We Dig Deep</h3>
        <p class="dig-deep-copy copy__secondary">
          <?php the_field('dig_deep_copy'); ?>
        </p>
      </div>

      <div class="mission-flex-ctn wb__affilates-ctn">

        <div class="affilates-img-ctn">
          <h3 class="affilates-title wb__red-sm-title">Affiliates &amp; Sponsors</h3>
          <a href="http://www.worldserveintl.org/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__worldserve-logo.png" alt=""></a>
          <a href="http://chrislongfoundation.org/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__chrislong-logo.png" alt=""></a>
        </div>
      </div>
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
    <!-- <span id="totalProgress"><?php echo $amount ?></span> -->
    <?php endwhile; ?>
  <?php endif ?>
<?php get_footer(); ?>
