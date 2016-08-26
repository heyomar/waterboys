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
      <ul>

        <li>Arizona Cardinals Team Photography</li>
        <li>Baltimore Ravens Team Photography </li>
        <li>Buffalo Bills Team Photography </li>
        <li>Carolina Panthers Team Photography </li>
        <li>Bill Smith/Chicago Bears </li>
        <li>Denver Broncos Team Photography </li>
        <li>Getty Images</li>
        <li>Houston Texans Team Photography</li>
        <li>Indianpolis Colts Team Photography </li>
        <li>Green Bay Packers Photography</li>
        <li>Steve Sanders/Kansas City Chiefs </li>
        <li>Miami Dolphins Team Photography </li>
        <li>Minnesota Vikings Team Photography </li>
        <li>New York Jets Team Photography </li>
        <li>New England Patriots/Keith Nordstrom</li>
        <li>Oakland Raiders</li>
        <li>Philadelphia Eagles Team Photography </li>
        <li>Pittsburgh Steelers Team Photography </li>
        <li>St. Louis Rams Team Photography </li>
        <li>Tennessee Titans</li>
        <li>Nadus Films</li>
        <li>Clay Cook Photography</li>

      </ul>
    </div>
    <div class="st__bar-ctn">
      <p>Credit those snaps.</p>
    </div>
    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
