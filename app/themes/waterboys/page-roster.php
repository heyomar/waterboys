<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php
          $pd_query = "select * from wp_posts as p
          left join (select * from wp_postmeta where meta_key = 'team') as pm on p.ID = pm.post_id
          left join (select plyr_id, sum(donation) as total_donations from wp_donations group by plyr_id ) as t_donations on p.ID = t_donations.plyr_id
          where p.post_type='player' and p.post_status='publish'
          order by total_donations desc
          ;
          ;";
          $players_and_donations = $wpdb->get_results($pd_query);
          ?>
      <div class="center rs__slider-ctn" data-slick="centerMode: true,">


<?php $counter = 1;
      foreach($players_and_donations as $player) { //$player is an OBJECT ?>

            <div class="block-hold" style="background-image:url('<?php echo wp_get_attachment_url(get_post_meta($player->ID, 'player_slider_image', true)); ?>')">
              <div class="rs__slider-overlay">
                <div class="rs___slider-flex-ctn-wrapper">
                  <div class="rs___slider-flex-ctn">
                    <a href="<?php echo get_permalink($player->ID) ?>"><div class="rs__slider-nameplate">
                      <h3><?php echo $player->post_title; ?></h3>
                      <p class="wb__red-sm-title">
                        <?php echo $player->meta_value ?>
                      </p>
                    </div></a>
                  </div>
                  <div class="rs___slider-flex-ctn">

                    <div class="rs__slider-player-minidash">
                      <span class="dash__item-title">Total Raised</span>
                      <p>$
                        <?php
                        $donationAmount = $player->total_donations;
                        echo number_format($donationAmount / 100)  ?>
                      </p>
                    </div>
                    <div class="rs__slider-player-minidash">
                      <span class="dash__item-title">Ranking</span>
                      <p>
                       <?php echo $counter; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <?php
            $counter +=1;
            }
            ?>
      </div>

      <div class="rs__ctn">
        <h2 class="rs__title">The Roster<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/roster__blue-wave.png" ></h2>
              <p class="copy__intro">
              As Waterboys, these NFL stars are teaming up with fans to supply rural East African communities with clean, accessible drinking water.
            </p>
        <div class="table-ctn">
          <table id="roster__table" border="0" id="roster" class="tablesorter roster">
            <thead>
              <tr>
                <th>Waterboys</th>
                <th>Team</th>
                <th>Fundraising Rank</th>
              </tr>
            </thead>
            <tbody>

                    <?php
                    $counter = 1;
                    foreach($players_and_donations as $player) {
                    //$player is an OBJECT
                    ?>
                    <tr>
                      <td><a href="<?php echo get_permalink($player->ID) ?>"
                      ><?php echo $player->post_title; ?></a></td>
                      <td><?php echo $player->meta_value; ?></td>
                      <td><?php echo $counter ?> </td>
                    </tr>
                    <?php
                    $counter +=1;
                    }
                    ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- <div class="rs__honor-bg">
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
                  <p class="rs__honor-team-copy">Conquering Kili</p>
                </div>

                <div class="rs__raised-ctn">
                  <h3 class="wb__red-sm-title">Total Raised</h3>
                  <p>

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
                  </p>
                  <a href="/player/blake-watson" class="wb__button-blue">View Profile</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div> -->
      </div>
      <div class="cta">
        <p>As athletes, we have a tremendous opportunity to use our platforms to make an immediate difference. - Chris Long</p>
      </div>
      <!-- <div class="wb__mission-socialbar-ctn rs__space">
        <div class="socialbar-buttons-ctn">
          <a href="/special-teams" class="socialbar-button wb__button">Meet Our Special Teams</a>
        </div>
      </div> -->
      <?php endwhile; ?>
        <?php endif ?>
          <?php get_footer(); ?>
