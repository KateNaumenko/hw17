<?php
/* Template Name: Page Gallery*/

get_header(); ?>

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

      <div class="portfolio__item-wrapper">
        <div class="portfolio__item">
          <div class="portfolio__hover">
            <label for="popup-checkbox-<?php echo get_the_ID() ?>" class="portfolio__popup-shower">
              <i class="fas fa-search"></i>
            </label>
          </div>
          <?php the_post_thumbnail('gallery-medium', array('class' => 'portfolio__photo img')); ?>
        </div>
        <div class="portfolio__popup-wrapper">
          <input type="checkbox" class="portfolio__popup-checkbox" id="popup-checkbox-<?php echo get_the_ID() ?>">


          <div class="portfolio__popup">
            <div class="portfolio__popup-content portfolio__img">
              <label for="popup-checkbox-<?php echo get_the_ID() ?>" class="portfolio__popup-closer">&#215;</label>
              <?php the_post_thumbnail('gallery-large', array('class' => 'portfolio__photo img')); ?>
              <div class="popup portfolio-slide__popup">
                <input id="popup__open-<?php echo get_the_ID() ?>" type="checkbox">
                <label for="popup__open-<?php echo get_the_ID() ?>">
                  <i class="fas fa-expand-arrows-alt"></i>
                </label>
                <div class="popup__open">
                  <div class="popup__content">
                    <div class="popup__text">
                      <h2 class="popup__title">
                        <?php the_title(); ?>
                      </h2>
                      <p class="popup__profession">
                        <?php the_field('type'); ?>
                      </p>
                      <p>
                        <?php the_content(); ?>
                      </p>
                    </div>
                    <div class="popup__icons">
                      <a href="javascript:void(0)" class="social-icon__popup-link">
                        <i class="fas fa-heart"></i>
                      </a>
                      <a href="javascript:void(0)" class="social-icon__popup-link">
                        <i class="fas fa-share"></i>
                      </a>
                      <a href="javascript:void(0)" class="social-icon__popup-link">
                        <i class="fas fa-envelope"></i>
                      </a>
                    </div>
                    <div class="popup__nav">
                      <div class="popup__arrow">
                        <i class="fas fa-chevron-left arrow l"></i>
                      </div>
                      <div class="popup__arrow">
                        <i class="fas fa-chevron-right arrow r"></i>
                      </div>
                      <div class="num"></div>
                    </div>
                  </div>
                </div>
              </div>
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
