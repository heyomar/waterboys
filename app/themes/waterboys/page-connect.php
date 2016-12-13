<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero cn__hero-bg">
      <h2 class="st__title textured">Connect<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>
    <div class="cn__ctn">
      <div class="cn__sidebar-ctn">
        <div class="cn__sidebar-info">
          <p class="copy__intro">Connect with us on social or contact us directly to learn more about our efforts to provide clean, accessible drinking water to East African communities in need.</p>

              <p class="copy__secondary">The Chris Long Foundation c/o The Moneta Group<br>
              100 South Brentwood Blvd., Suite 500<br>
              Clayton, Missouri 63105</p><br>
            <a class="basic__link" href="mailto:Events@chrislongfoundation.org">events@chrislongfoundation.org</a>
        </div>
      </div>
      <div class="cn__form-ctn">
        <div class="cn__social-ctn">
          <h3 class="wb__red-sm-title">Huddle Up</h3>
          <div class="cn__social-icons-ctn cn__ctn">
            <a class="cn__icon-flex" target="_blank" href="https://twitter.com/waterboysorg">
              <svg class="icon icon-twitter">
                <use xlink:href="#icon-twitter"></use>
              </svg>
              <br> @WaterboysORG</a>
            <a class="cn__icon-flex" target="_blank" href="https://www.facebook.com/waterboysorg">
              <svg class="icon icon-facebook-square">
                <use xlink:href="#icon-facebook-square"></use>
              </svg>
              <br>/WaterboysORG</a>
            <a class="cn__icon-flex" target="_blank" href="https://www.instagram.com/waterboysorg/">
              <svg class="icon icon-facebook-square">
                <use xlink:href="#icon-instagram"></use>
              </svg>
              <br>/WaterboysORG</a>
          </div>
          </a>
        </div>
        <?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); } ?>
      </div>
    </div>
    <div class="cta">
      <p>"Being a human being doesn’t have borders or nationality." — Chris Long</p>
    </div>



    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
