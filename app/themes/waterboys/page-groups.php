<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero">
      <h2 class="st__title">Groups<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>

<div class="gr__ctn">
  <p class="gr__head-copy">
    Waterboys unites players and fans from across the NFL to bring life-sustaining well water to East African communities in need. We provide clean, safe and sustainable water access by hiring local crews to drill deep-bore wells serving up to 7,500 people. At a cost of $45,000 per well, every drop counts.
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
          <tr>
            <td>Smith</td>
            <td>John</td>

          </tr>
          <tr>
            <td>Bach</td>
            <td>Frank</td>

          </tr>
          <tr>
            <td>Doe</td>
            <td>Jason</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
          <tr>
            <td>Conway</td>
            <td>Tim</td>

          </tr>
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
