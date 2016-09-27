<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero legal__hero-bg">
      <h2 class="st__title">Photo Credits<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

    <div class="rs__ctn wb__page-legal">
      <p>
        <a href="/">Waterboys Initiative</a> would like to thank the following for photos on our website. <br>
        Photos courtesy of:
      </p>
      <?php the_field('legal_body'); ?>
    </div>
    <div class="st__bar-ctn">
      <p>Credit those snaps.</p>
    </div>
    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
