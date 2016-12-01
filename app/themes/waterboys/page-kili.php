<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- <div class="wb__page-hero ck__hero-bg">
      <h2 class="st__title">Conquering Kili<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div> -->

    <div style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/header__conqueringkili.jpg') top center no-repeat; background-size: cover;" class="wb__player__header">
        <div class="wb__player-name-ctn"><h2 class="wb__player-name">Conquering Kili</h2>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-wave.png" alt="" />

      </div>


    </div>
    <div class="wb__page-dash-ctn">
      <div class="wb__page-dash-inner-ctn">
        <?php
          global $wpdb;
          $playerid = '324';
          $donations = $wpdb->get_results("SELECT donation FROM wp_donations WHERE plyr_id = $playerid");
          $donationTotal = 0;
          foreach ($donations as $donation) {
            $donationTotal += (int)$donation->donation;
          }
          $donationTotal = ceil($donationTotal/100);

        ?>
        <div class="wb__page-dash-item">
          <h3>Fundraising Goal</h3>
          <div class="dash__goal">$<span>150,000</span></div>
        </div>
        <div class="wb__page-dash-item">
          <h3>Progress to Goal</h3>
          <div class="wb__progressgoal-ctn">
            <div id="progressbar" class="wb__progressgoal-bar"></div>
          </div>
          <div class="wb__progressgoal-amount dash__progress"><br>$
          <span>
            <?php
            $printTotal = $donationTotal;
            echo number_format($printTotal);
            ?>
          </span>
        </div>

        </div>
        <div class="wb__page-dash-item">
          <div class="wb__dash-donate"><a class="wb__button" href="/donate/?plyr=324">Donate Now</a></div>
        </div>
      </div>
    </div>





<div class="rs__ctn ck__body-copy">
  <p class="copy__intro"><strong>Each season, Waterboys champion, Green Beret and former Seattle Seahawk Nate Boyer and the rest of the Waterboys challenge combat veterans and NFL alumni to take on a new mission: conquering Africa’s highest peak, Mount Kilimanjaro.</strong></p>
  <p class="copy__secondary">Conquering Kili raises awareness for water scarcity issues and empowers veterans to recognize that no goal is too lofty. Donations to this initiative fund both well projects and the cost of the climb. Help the #ConqueringKili crew reach new heights.</p>
</div>

<div class="rs__honor-bg">
  <div class="rs__ctn">
    <div class="rs__ctn rs__honor-copy">
      <h3>Conquering Kili Participants</h3>
    </div>
    <div style="max-width:480px;" class="rs__ctn">
      <div class="rs__honor-ctn">
        <div class="rs__honor-item">
          <div class="rs__honor-image-1"></div>
          <div class="rs__honor-info-ctn">
            <div class="rs__honor-name-ctn">
              <h2 class="rs__honor-name-copy">Nate Boyer</h2>
              <p class="rs__honor-team-copy">Former Green Beret &amp; NFL Player</p>
            </div>

            <div class="rs__raised-ctn ck__pad">
              <a href="/player/nate-boyer" class="wb__button-blue">View Profile</a>
            </div>
          </div>
        </div>

        <!-- <div class="rs__honor-item">
          <div class="rs__honor-image-2"></div>
          <div class="rs__honor-info-ctn">
            <div class="rs__honor-name-ctn">
              <h2 class="rs__honor-name-copy">Blake Watson</h2>
              <p class="rs__honor-team-copy">Marine Combat Veteran</p>
            </div>
            <div class="rs__raised-ctn ck__pad">
              <a href="/" class="wb__button-blue">View Profile</a>
            </div>
          </div>
        </div> -->

      </div>
    </div>
  </div>
  </div>
</div>
<div class="cta">
  <p>Mount Kilimanjaro is 19,341 feet at its highest point.</p>
</div>
<span id="printTotal"><?php echo $printTotal ?></span>
<span id="fundTotal"><?php echo $fundgoal ?></span>
      <?php endwhile; ?>
  <?php endif ?>
<?php get_footer(); ?>
