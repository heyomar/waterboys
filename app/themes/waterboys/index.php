<?php
/**
 * index.php
 *
 * index.php is the ultimate fallback in the template heirarchy. This will be
 * run if no other templates are matched.
 *
 * @package Offset\Templates
 * @author Paul Graham <paul@bytefair.com>
 * @license http://opensource.org/licenses/MIT
 * @since 0.1.0
 */

 get_header(); ?>
  <div class="wb__page-hero hl__page-hero">
    <h2 class="hl__title">Highlights<br>
      <img class="hl__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/wb__home-wave.png" alt="">
    </h2>
  </div>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="hl__article-bg">
      <div class="hl__article-ctn">
        <div class="mission-ctn hl__article-ctn">
          <div class="hl__flex-ctn">
            <div class="hl__post-thumbnail-ctn" style="background-image:url('<?php the_field('press_thumbnail'); ?>');"></div>
            <div class="hl__flex-child-copy">
              <?php get_template_part('components/content', get_post_format()); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php endwhile; ?>
  <?php else:   get_template_part('components/content', 'none'); ?>
<?php endif ?>
<div class="st__bar-ctn"><nav class="pagination"><?php pagination_bar(); ?></nav></div>
<!-- <?php posts_nav_link(); ?> -->
<?php get_footer(); ?>
