<?php
/**
 * footer.php
 *
 * Site footer
 *
 * @package Offset\Templates
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.1.0
 */
?>

  </main>

  <footer role="contentinfo" class="site__footer">
    <div class="site__footer__content">
      <div class="wb__footer__social wb__footer__flex-item">
        <a href="https://twitter.com/waterboysorg">
          <svg class="icon icon-twitter">
            <use xlink:href="#icon-twitter"></use>
          </svg> @WaterboysORG</a>
        <a href="https://www.facebook.com/waterboysorg">
          <svg class="icon icon-facebook-square">
            <use xlink:href="#icon-facebook-square"></use>
          </svg> /WaterboysORG</a>
        <a href="https://www.instagram.com/waterboysorg/"><svg class="icon icon-facebook-square">
          <use xlink:href="#icon-instagram"></use>
        </svg> @WaterboysORG</a>
      </div>
      <nav class="wb__footer__links">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-footerlogo.png" alt="" />
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-chrislonglogo.png" alt="" />
        <?php
            $args = array(
                'theme_location' => 'footer-bottom'
            );
            ?>
          <?php wp_nav_menu($args); ?>
      </nav>
      <div class="wb__footer__nav wb__footer__flex-item">
        <?php
            $args = array(
                'theme_location' => 'footer'
            );
             ?>
          <?php wp_nav_menu($args); ?>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
    </body>

    </html>
