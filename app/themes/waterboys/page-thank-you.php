<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/header__donate.jpg') top center no-repeat; background-size: cover;">
      <h2 class="st__title">Thank You<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

    <div class="ty__ctn">
      <div class="ty__inner-ctn">
        <div class="ty__body-copy-ctn">
          <p>Thank you for teaming up with us to tackle thirst. Your generosity will mean so much to the people we serve. Connect with us on social media to witness our work in real time and see what your contribution can accomplish.</p>

        </div>

        <div class="ty__side-share-ctn">
          <a href="http://twitter.com/intent/tweet?text=I+just+teamed+up+to+tackle+thirst+with+@WaterboysORG.+Help+your+favorite+%23NFL+team+dig+deep+and+change+lives:" target="_blank" class="wb__button-blue">
            <svg class="icon icon-twitter">
              <use xlink:href="#icon-twitter"></use>
            </svg> Tweet</a>
          <br><br><br>
          <a href="https://www.facebook.com/waterboysorg" target="_blank" class="wb__button-blue">
            <svg class="icon icon-facebook-square">
              <use xlink:href="#icon-facebook-square"></use>
            </svg> Share</a>
        </div>
      </div>
    </div>

    <div class="cta">
      <p>Pile on: Every $1 spent on water and sanitation has a $4 return.&nbsp;</p>
    </div>

    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
