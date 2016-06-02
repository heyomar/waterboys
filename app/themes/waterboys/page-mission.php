<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="wb__page-hero">
      <h2 class="mission__title"> Our Mission<br>
        <img class="mission__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png">
      </h2>
    </div>

    <div class="mission-ctn">
      <div class="mission-flex-ctn wb__mission-hero-copy">
        <p class="mission-flex-child">
          <?php the_field('hero_sub_copy'); ?>
        </p>
      </div>
      <div class="mission-flex-ctn wb__mission-meter-ctn">
        <img class="mission-meter-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__wells-funded.png" alt="" />
        <div class="mission-flex-child wb__mission-meter">
          <p class="wb__red-sm-title mission__meter-title">Progress To Next Level</p>
        </div>
      </div>
      <div class="mission-flex-ctn">
        <p class="mission-flex-child meter-sub-copy">
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
                <h3 class="wb__red-sm-title reasons__description-title">Education</h3> <br>
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
                <h3 class="wb__red-sm-title reasons__description-title">Agriculture</h3> <br>
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
                <h3 class="wb__red-sm-title reasons__description-title">Economy</h3> <br>
                <?php the_field('reasons_economy_copy'); ?>
            </div>
          </div>
        </div>

        <div class="reasons-flex-child mission-reason">
          <div class="mission-inner-flex-ctn">
            <div class="mission-flex-image">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-agriculture.png" alt="">
            </div>

            <div class="mission-flex-para">
                <h3 class="wb__red-sm-title reasons__description-title">Health</h3> <br>
                <?php the_field('reasons_health_copy'); ?>
            </div>
          </div>
        </div>

        <p class="mission-flex-child reasons-sub-copy">
          <?php the_field('reasons_sub_copy'); ?>
        </p>
      </div>
    </div>
    <div id="wb__mission-video-ctn" class="wb__mission-video-ctn">
      <iframe src="https://www.youtube.com/embed/_nWaaS66Fw8?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="mission-ctn">
      <div class="mission-flex-ctn wb__dig-deep-ctn">
        <h3 class="wb__dig-deep-title wb__red-sm-title">How We Dig Deep</h3>
        <p class="dig-deep-copy">
          <?php the_field('dig_deep_copy'); ?>
        </p>
      </div>

      <div class="mission-flex-ctn wb__affilates-ctn">

        <div class="affilates-img-ctn">
          <h3 class="affilates-title wb__red-sm-title">Affiliates &amp; Sponsors</h3>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__worldserve-logo.png" alt="">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__chrislong-logo.png" alt="">
        </div>
      </div>
    </div>


    <div class="wb__mission-socialbar-ctn">
      <p class="socialbar-copy">Bring it in. Connect with us on social.</p>
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
