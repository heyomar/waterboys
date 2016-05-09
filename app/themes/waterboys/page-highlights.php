<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero">
      <h2 class="hl__title">Special Teams</h2>
      <img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt="">
    </div>






  <?php endwhile; ?>
    <?php endif ?>
      <?php get_footer(); ?>
