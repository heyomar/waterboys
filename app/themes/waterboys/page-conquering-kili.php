<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="wb__page-hero ck__hero-bg">
      <h2 class="st__title">Conquering Kili<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt=""></h2>
    </div>
<!-- <div class="wb__page-dash-ctn">
  <div class="wb__page-dash-inner-ctn">
    <div class="wb__page-dash-item">
      <h3>Fundraising Goal</h3>
    </div>
    <div class="wb__page-dash-item">
      <h3>Progress to Goal</h3>
    </div>
    <div class="wb__page-dash-item">
      <div class="wb__dash-donate"><a class="wb__button" href="/">Donate Now</a></div>
    </div>
  </div>
</div> -->
<div class="rs__ctn ck__body-copy">
  <p><strong>Each season, Waterboys champion, Green Beret and former Seattle Seahawk Nate Boyer challenges combat veterans and NFL alumni to join him on a new mission: conquering Africa’s highest peak, Mount Kilimanjaro.</strong></p>
  <p>Conquering Kili raises awareness for water scarcity issues and empowers veterans to recognize that no goal is too lofty. Donations to this initiative fund both well projects and the cost of the climb. Help the #ConqueringKili crew reach new heights.</p>
</div>

<div class="rs__honor-bg">
  <div class="rs__ctn">
    <div class="rs__ctn rs__honor-copy">
      <h3>Conquering Kili Participants</h3>
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

            <div class="rs__raised-ctn ck__pad">
              <a href="/" class="wb__button-blue">View Profile</a>
            </div>
          </div>
        </div>

        <div class="rs__honor-item">
          <div class="rs__honor-image-2"></div>
          <div class="rs__honor-info-ctn">
            <div class="rs__honor-name-ctn">
              <h2 class="rs__honor-name-copy">Yadier Molina</h2>
              <p class="rs__honor-team-copy">TEAM NAME</p>
            </div>
            <div class="rs__raised-ctn ck__pad">
              <a href="/" class="wb__button-blue">View Profile</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</div>


      <?php endwhile; ?>
  <?php endif ?>
<?php get_footer(); ?>
