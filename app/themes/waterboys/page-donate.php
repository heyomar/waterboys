<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="wb__page-hero">
      <h2 class="mission__title"> Donate<br>
        <img class="mission__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png">
      </h2>
    </div>

    <div class="dn__flex-ctn">
      <div class="dn__now-ctn">
        <div class="dn__now-copy-ctn">
          <p class="copy-highlight">
            Each deep-bore well costs $45,000 to install. Just one can serve up to 7,500 people. That’s $6 per person. Six dollars can save a life, send a child to school, and return countless hours.
          </p>
          <p>
            For an issue with impact this broad, every contribution counts: every dollar, every drop.
          </p>
          <div class="dn__select-ctn">
            <h3 class="wb__red-sm-title">Donate Now</h3>
            <div class="dn__select-amount-ctn">

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="6">$6</span>
              <p>to provide water access to one person</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="30">$30</span>
              <p>to provide water access to one household</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="100">$100</span>
              <p>to save 35,000 hours spent on retrival</p></div>

              <div class="dn__flex-ctn"><span class="dn__select-amount-btn" data-donation="300">$300</span>
              <p>to prevent a 292,000 km jerrycan carry</p></div>

              <label class="" for="custom-amount">$ Custom Amount</label>
              <input type="number" id="custom-amount" name="custom-amount" value="">

            </div>
          </div>
        </div>
      </div>



      <div class="cn__sidebar-ctn">
        <div class="cn__sidebar-info">
          <p>
            Water scarcity limits millions of people in the developing world in ways you might not imagine.
          </p>
          <h3 class="wb__red-sm-title">Education</h3>
          <p class="wb__player__content__body">
            Women are primarily responsible for retrieving water, and often have to bring their children. Reducing the distance to a water source by just 15 minutes results in a 12% increase in girls’ school attendance.
          </p>

          <h3 class="wb__red-sm-title">Economy</h3>
          <p class="wb__player__content__body">
            People living in Sub-Saharan Africa spend more than 40 billion hours per year retrieving water. Water access frees time to generate income.
          </p>

          <h3 class="wb__red-sm-title">Agriculture</h3>
          <p class="wb__player__content__body">
            With dependable access to ample drinking water, families can afford to farm.
          </p>

          <h3 class="wb__red-sm-title">Health</h3>
          <p class="wb__player__content__body">
            Water-related diseases currently cause nearly 1 in 5 deaths of children under 5. It doesn’t have to be this way.
          </p>
        </div>
      </div>
    </div>

    <!-- <div class="dn__ctn"> -->
      <?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 6 ); }?>
    <!-- </div> -->
    <div class="st__bar-ctn">
      <p>14 million Tanzanians lack access to safe water. Dig deep with us. &nbsp;</p>
    </div>
    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
