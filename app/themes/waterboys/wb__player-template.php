
<?php
/*
Template Name: Player Profile
*/
?>


<?php
get_header();
if (have_posts()) :
   while (have_posts()) :
      the_post();
      the_post_thumbnail('full');

   endwhile;
endif;
?>
<div class="wb__player-container">
  <div class="wb__player-content wb__content-bio">
    <p> WATERBOY BIO</p>
  </div>
  <div class="wb__player-content wb__content-info">
  </div>
</div>

<div class="wb__player-viewall">
  <a class="wb__button" href="/">View All Players</a>
</div>


<?php get_footer(); ?>
