<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php $players = new WP_Query(array('post_type' => 'player', 'posts_per_page' => -1));?>

      <div class="center rs__slider-ctn" data-slick="centerMode: true,">
        <?php
    if ($players->have_posts()): ?>
          <?php while ($players->have_posts()) : $players->the_post();  ?>


            <div class="block-hold" style="background-image:url('<?php the_field('player_slider_image'); ?>')">
              <div class="rs__slider-overlay">
                <div class="rs___slider-flex-ctn-wrapper">
                  <div class="rs___slider-flex-ctn">
                    <div class="rs__slider-nameplate">
                      <h3><a href="<?php echo get_permalink(); ?>"><?php the_field('player_name'); ?></a></h3>
                      <p class="wb__red-sm-title">
                        <?php the_field('team'); ?>
                      </p>
                    </div>
                  </div>
                  <div class="rs___slider-flex-ctn">
                    <?php
                          global $wpdb;
                          $playerid = get_the_ID();
                          $donations = $wpdb->get_results("SELECT donation FROM wp_donations WHERE plyr_id = $playerid");
                          $donationTotal = 0;
                          foreach ($donations as $donation) {
                            $donationTotal += (int)$donation->donation;
                          }
                          $donationTotal = ceil($donationTotal/100);
                        ?>
                    <div class="rs__slider-player-minidash">
                      <h3 class="wb__red-sm-title">Total Raised</h3>
                      <p>
                        $<?php echo $donationTotal ?>
                      </p>
                    </div>
                    <div class="rs__slider-player-minidash">
                      <h3 class="wb__red-sm-title">Ranking</h3>
                      <p>
                        3RD
                      </p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <?php endwhile; ?>
              <?php endif ?>
      </div>

      <div class="rs__ctn">
        <h2 class="rs__title">The Roster<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/roster__blue-wave.png" ></h2>
              <p class="wb__copy">
              As Waterboys, these NFL stars are teaming up with fans to supply rural East African communities with clean, accessible drinking water.
            </p>
        <div class="table-ctn">
          <table border="0" id="roster" class="tablesorter roster">
            <thead>
              <tr>
                <th><a class="wb__red-sm-title" href="#">Waterboys</a></th>
                <th><a class="wb__red-sm-title" href="#">Team</a></th>
                <th><a class="wb__red-sm-title" href="#">Fundraising Rank</a></th>
              </tr>
            </thead>
            <tbody>
                <?php if ($players->have_posts()): ?>
                  <?php while ($players->have_posts()) : $players->the_post();  ?>
                    <tr>
                      <td><a href="<?php echo get_permalink(); ?>"><?php the_field('player_name'); ?></a></td>
                      <td><?php the_field('team'); ?></td>
                      <td>1st</td>
                    </tr>
                  <?php endwhile; ?>
                <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="rs__honor-bg">
        <div class="rs__ctn rs__honor-copy">
          <h3>Honorary Waterboys</h3>
          <p>Our honorary Waterboys work in — and play on— other fields, but demonstrate the same passion and dedication to.</p>
        </div>
        <div class="rs__ctn">
          <div class="rs__honor-ctn">
            <div class="rs__honor-item">
              <div class="rs__honor-image-1"></div>
              <div class="rs__honor-info-ctn">
                <div class="rs__honor-name-ctn">
                  <h2 class="rs__honor-name-copy">Nate Boyer</h2>
                  <p class="rs__honor-team-copy">TEAM NAME</p>
                </div>

                <div class="rs__raised-ctn">
                  <h3 class="wb__red-sm-title">Total Raised</h3>
                  <p>
                      $<?php echo $donationTotal ?>
                  </p>
                  <a href="/player/nate-boyer" class="wb__button-blue">View Profile</a>
                </div>
              </div>
            </div>

            <div class="rs__honor-item">
              <div class="rs__honor-image-2"></div>
              <div class="rs__honor-info-ctn">
                <div class="rs__honor-name-ctn">
                  <h2 class="rs__honor-name-copy">BLAKE WATSON</h2>
                  <p class="rs__honor-team-copy">MARINE COMBAT VETERAN</p>
                </div>
                <div class="rs__raised-ctn">
                  <h3 class="wb__red-sm-title">Total Raised</h3>
                  <p>
                      $<?php echo $donationTotal ?>
                  </p>
                  <a href="/player/blake-watson" class="wb__button-blue">View Profile</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      </div>
      <div class="st__bar-ctn">
        <p>14 million Tanzanians lack access to safe water. Dig deep with us.</p>
      </div>
      <!-- <div class="wb__mission-socialbar-ctn rs__space">
        <div class="socialbar-buttons-ctn">
          <a href="/special-teams" class="socialbar-button wb__button">Meet Our Special Teams</a>
        </div>
      </div> -->
      <?php endwhile; ?>
        <?php endif ?>
          <?php get_footer(); ?>
