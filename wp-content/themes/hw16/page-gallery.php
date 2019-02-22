<?php
/* Template Name: Page Gallery*/
?>

<?php get_header(); ?>

  <section class="container portfolio-container top">
    <div class="portfolio">
      <div class="portfolio__item-title">
        <h1 class="portfolio__title">
          <?php the_title(); ?>
        </h1>
        <?php
          while ( have_posts() ) : the_post(); ?>
            <div class="entry-content-page">
              <?php the_content(); ?>
            </div>
          <?php endwhile;
            wp_reset_query(); ?>
      </div>

      <?php
      $args = array('post_type'=>array('posts', 'photo'));
      query_posts($args);
      while ( have_posts() ) : the_post();
      ?>

      <div>
        <div class="portfolio__item">
          <div class="portfolio__hover">
            <label for="popup-checkbox-<?php echo get_the_ID() ?>" class="portfolio__popup-shower">
              <i class="fas fa-search portfolio__icon"></i>
            </label>
          </div>
          <img src="<?php the_field('gallery_photo'); ?>" alt="Photo from Portfolio" class="portfolio__photo img">
        </div>
        <div class="portfolio__popup-wrapper">
          <input type="checkbox" class="portfolio__popup-checkbox" id="popup-checkbox-<?php echo get_the_ID() ?>">
          <div class="portfolio__popup">
            <div class="portfolio__popup-content portfolio__img">
              <label for="popup-checkbox-<?php echo get_the_ID() ?>" class="portfolio__popup-closer">&#215;</label>
              <img src="<?php the_field('gallery_photo'); ?>" alt="Photo from Portfolio" class="portfolio__photo img">
            </div>
          </div>
        </div>
      </div>

      <?php endwhile; ?>

    </div>
  </section>
  <div class="up container">
    <a class="link up__link" href="#">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

<?php get_footer(); ?>
