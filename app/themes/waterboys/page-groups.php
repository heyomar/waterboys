<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero gp__page-hero">
      <h2 class="st__title">Groups<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

<div class="gr__ctn">
  <p class="gr__head-copy">
    Waterboys brings together NFL players and fans to tackle one mission together: bring life-sustaining well water to East African communities in need. We provide clean, safe and sustainable water access by hiring local crews to drill deep-borehole wells serving up to 7,500 people. At a cost of $45,000 per well, every drop counts. <br> <br>

    Start your own fundraising group: recruit your family, friends, neighbors, colleagues and social networks. Set your group’s fundraising goal, engage your members, create a challenge and have some fun for a good cause! <br><br>

    Feeling competitive? Challenge another group to see who can fundraise the most, the fastest, or who’s the first to catch up to their favorite Waterboy.<br><br>

    No matter what you do, remember that every dollar makes a big difference for someone!<br>
  </p>
  <div class="gr__button-ctn"><a class="wb__button-blue" href="/register-group">Register A New Group</a></div>
  <div class="gr__table-ctn">
    <div class="">
      <table border="0" id="r" class="groups">
        <thead>
          <tr>
            <th><a class="wb__red-sm-title" href="#">Waterboys</a></th>
            <th><a class="wb__red-sm-title" href="#">Team</a></th>
          </tr>
        </thead>
        <tbody>
          <?php $groups = new WP_Query( array( 'post_type' => 'group' ) );?>
            <?php if( $groups->have_posts()): ?>
              <?php while ( $groups->have_posts()) : $groups->the_post();  ?>
          <tr>
            <td><a href="<?php echo get_permalink(); ?>"><?php the_field('group_name'); ?></a></td>
            <td><?php the_field('location_body'); ?></td>
          </tr>
        <?php endwhile; ?>
      <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="st__bar-ctn">
  <p>“Individual commitment to a group effort — that is what makes a team work.” — Vince Lombardi&nbsp;</p>
</div>

  <?php endwhile; ?>
    <?php endif ?>
      <?php get_footer(); ?>
