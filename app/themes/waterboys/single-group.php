<?php /*
Template Name: Group Profile
*/ ?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
    $image = get_field('desktop_header');
    if( !empty($image) ): ?>
    <img class="wb__player__content__header-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <div class="wb__player__header">
        <h2 class="wb__player-name"><?php the_field('player_name'); ?></h2>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/wb__home-wave.png" alt="" />
        <p class="wb__player-team"><?php the_field('team'); ?></p>
    </div>
  <?php endif; ?>
      <div class="wb__player-container">
          <div class="wb__player-content wb__content-bio">
              <div class="wb__player__content-career">
                <p class="wb__player__content__title wb__player__bio-title"><?php the_field('bio_title'); ?></p>
                <p class="wb__player__content__body"><?php the_field('bio_body'); ?></p>
              </div>
          </div>
          <div class="wb__player-content wb__content-info">
            <p class="wb__player__content__info-position wb__player__content__title wb__player__info-title"><?php the_field('position_title'); ?></p>
              <p><?php the_field('position'); ?></p>
            <p class="wb__player__content__info-college wb__player__content__title wb__player__info-title"><?php the_field('college_title'); ?></p>
              <p><?php the_field('college'); ?></p>
            <p class="wb__player__content__info-careerhighlights wb__player__content__title wb__player__info-title"><?php the_field('careerhighlights_title'); ?></p>
            <?php
            if( have_rows('career_highlights') ): ?>
                <ul class="wb__player__career-ul">
                <?php while ( have_rows('career_highlights') ) : the_row(); ?>
                    <li><?php the_sub_field('highlight');?></li>
                <? endwhile;?>
                </ul>
            <?php else : ?>
            <?php endif; ?>
          </div>
      </div>
      <div class="wb__player-viewall">
          <a class="wb__button" href="/">View All Players</a>
      </div>
<?php endwhile; ?>
<?php endif ?>
<?php get_footer(); ?>
