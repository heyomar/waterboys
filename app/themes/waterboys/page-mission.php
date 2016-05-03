<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="wb__page-hero">
    <h2 class="mission-title"></h2>
    <img src="" alt="" />
  </div>
  <div class="mission-flex-ctn wb__mission-hero-copy">
    <p class="mission-flex-child">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.</p>
  </div>

  <div class="mission-flex-ctn wb__mission-meter-ctn">
    <img class="mission-meter-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__wells-funded.png" alt="" />
    <div class="mission-flex-child wb__mission-meter"><p class="wb__red-sm-title">Progress To Next Level</p></div>
    <p class="mission-flex-child meter-sub-copy">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.</p>
  </div>

  <div class="mission-flex-ctn wb__mission-reasons-ctn">
    <div class="reasons-flex-child wb__mission-education mission-reason"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-education.png" alt="">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.
      </p>
    </div>
    <div class="reasons-flex-child wb__mission-agriculture mission-reason"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-agriculture.png" alt="">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.
      </p>
    </div>
    <div class="reasons-flex-child wb__mission-economy mission-reason"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-economy.png" alt=""><p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.
    </p></div>
    <div class="reasons-flex-child wb__mission-health mission-reason"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__reasons-health.png" alt=""><p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.
    </p></div>
    <p class="mission-flex-child reasons-sub-copy">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.</p>
  </div>

  <div class="wb__mission-video-ctn">
    <iframe src="https://www.youtube.com/embed/6v2L2UGZJAM" frameborder="0" allowfullscreen></iframe>
  </div>
  <div class="mission-flex-ctn wb__dig-deep-ctn">
    <h3 class="dig-deep-title wb__red-sm-title">How We Dig Deep</h3>
    <p class="dig-deep-copy">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed sapien quam. Sed dapibus est id enim facilisis, at posuere turpis adipiscing. Quisque sit amet dui dui.
    </p>
  </div>

  <div class="mission-flex-ctn wb__affilates-ctn">
    <div class="affilates-img-ctn">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__worldserve-logo.png" alt="">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/mission__chrislong-logo.png" alt="">
    </div>
  </div>

  <div class="wb__mission-socialbar-ctn">
    <p class="socialbar-copy">Bring it in. Connect with us on social.</p>
    <a href="" class="socialbar-button"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-footertwitter.svg" class="social-button-icon"/> Tweet</a>
    <a href="" class="socialbar-button"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-footerfacebook.svg" class="social-button-icon"/> Share</a>
  </div>
<?php endwhile; ?>
<?php endif ?>
<?php get_footer(); ?>
