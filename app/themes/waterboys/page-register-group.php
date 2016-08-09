<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero">
      <h2 class="st__title">Register A New Group<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

<div class="rg__ctn">
  <p class="rg__head-copy">
    Groups are a great way to motivate your friends, family, students or colleagues around our cause. Register your group and start recruiting members to share goals and track progress.
  </p>
  <div class="rg__form-ctn">
    <?php if (function_exists('ninja_forms_display_form')) {
    ninja_forms_display_form(7);
} ?>
  </div>
</div>



    <div class="st__bar-ctn">
      <p>Rally around a cause.&nbsp;</p>
    </div>


    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
