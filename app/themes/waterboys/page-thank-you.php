<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero">
      <h2 class="st__title">Tackle Thirst<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

    <div class="st__ctn">
      <p>
        Thank you for teaming up with us to tackle thirst. Your generosity will mean so much to the people we serve. Connect with us on social media to witness our work in real time and see what your contribution can accomplish.
      </p>
      <div class="ty__side-share-ctn">
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
    </div>



    <div class="st__bar-ctn">
      <p>14 million Tanzanians lack access to safe water. Dig deep with us. &nbsp;</p>
    </div>

    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
