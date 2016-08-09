<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero st__hero-bg">
      <h2 class="st__title">Special Teams <br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>



    <div class="st__ctn">
      <div class="st__hero-subcopy">
        <p>These special teams and trick plays go beyond our basic donation structure to engage fans and spread awareness.
        </p>
      </div>

      <div class="st__flex-ctn">
        <div class="st__flex-child st__box">
          <h2 class="st__box-title">Conquering Kili</h2>
          <div class="st__box-description">
            <h2 class="st__description-title">Conquering Kili</h2>
            <p>Football is a game of inches. Hiking Africa’s highest mountain is, too. Our Conquering Kili program raises funding for wells while empowering veterans by proving that anything is possible, taken inch by inch.</p>
            <a href="" class="st__box-description-link"></a>
          </div>
        </div>

        <div class="st__flex-child st__box">
          <h2 class="st__box-title">Head-To-Head</h2>
          <div class="st__box-description">
            <h2 class="st__description-title">Head-To-Head</h2>
            <p>Our head-to-head matchups mirror real life face-offs during the NFL season, motivating fan bases to donate with each down. </p>
            <a href="" class="st__box-description-link"></a>
          </div>
        </div>

        <div class="st__flex-child st__box">
          <h2 class="st__box-title">Waterboy Challenge</h2>
          <div class="st__box-description">
            <h2 class="st__description-title">Waterboy Challenge</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
              irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="" class="st__box-description-link"></a>
          </div>
        </div>

        <div class="st__flex-child st__box">
          <h2 class="st__box-title">Street Team</h2>
          <div class="st__box-description">
            <h2 class="st__description-title">Street Team</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
              irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="" class="st__box-description-link"></a>
          </div>
        </div>
      </div>
    </div>

    <div class="st__bar-ctn">
      <p>14 million Tanzanians lack access to safe water. Dig deep with us. &nbsp;</p>
    </div>


    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
