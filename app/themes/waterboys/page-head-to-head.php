<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero">
      <h2 class="st__title textured">Head to Head<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

<div class="hh__ctn">
  <p class="">
    <strong>Our Head to Head match-ups mirror face-offs on the field, challenging fan bases to show their support and dominate with donations.</strong>
  </p>
  <p>
    While they throw touchdowns, you can throw down. Donate on behalf of your Waterboy to show his opponents what your fandom is made of. Scroll through the record to see which teams have the most dedicated fans donating, and check back to see whether your team trounces the competition in compassion.
  </p>
</div>
<div class="hh__donate-plug-ctn">

</div>

<div class="hh__ctn">
  <h3 class="wb__red-sm-title">Weekly Match Ups and Results</h3>
  <div class="gr__table-ctn">
    <div class="">

    </div>
  </div>
</div>
</div>






<div class="st__bar-ctn">
  <p>Back Your Boy Up.&nbsp;</p>
</div>


<?php endwhile; ?>
  <?php endif ?>
    <?php get_footer(); ?>
