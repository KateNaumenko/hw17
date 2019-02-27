<?php
/* Template Name: Front Page*/

 get_header(); ?>

  <section class="container top">
    <div class="cor">
      <div class="scrollD">

        <?php
        $args = array('post_type'=>array('posts', 'portfolio'));
        query_posts($args);
        while ( have_posts() ) : the_post();
          ?>

          <div class="portfolio-slide">
            <div class="portfolio-slide__img">
              <img src="<?php echo the_field('portfolio_image'); ?>" alt="<?php the_title() ?>" class="img">
            </div>
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

        <?php endwhile ?>

      </div>
    </div>
  </section>
  <section class="container bottom">
    <div class="workshop">
      <div class="workshop__img">
        <img src="<?php bloginfo('template_url'); ?>/img/workshop.png" alt="Workshop" class="img">
      </div>
      <div class="workshop__text">
        <h3 class="workshop__title">
          fashion workshop
        </h3>
        <p class="workshop__date">
          NOV 21-23
        </p>
        <p class="workshop__time">
          9:00am - 4:00pm
        </p>
        <div class="workshop__mark">
          rsvp
        </div>
      </div>
    </div>
    <div class="block">
      <h3 class="block__title">
        News
      </h3>
      <?php foreach (getNews() as $post): ?>
        <a href="<?php the_permalink(); ?>">
          <div class="block__text">
            <div class="block__img">
              <?php the_post_thumbnail('news-small', array($post->ID)); ?>
            </div>
            <div>
              <h4 class="block__text-title">
                <?php echo $post->post_title; ?>
              </h4>
              <p class="block__date">
                <?php echo $post->post_date; ?>
              </p>
              <p class="block__text-intro">
                <?php echo $post->post_content; ?>
              </p>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="contacts">
      <div class="contacts__top">
        <div>
          <img src="<?php bloginfo('template_url'); ?>/img/square-contact-logo.png" alt="Square" class="contacts__img">
        </div>
        <div class="contacts__items">
          <div class="contacts__item social-icon__link">
            <i class="fas fa-phone-square"></i>
            <a href="tel:+ 00 123 456 7890">
              + 00 123 456 7890
            </a>
          </div>
          <div class="contacts__item social-icon__link">
            <i class="fas fa-envelope"></i>
            <a href="mailto:info@square.com">
              info@square.com
            </a>
          </div>
          <div class="contacts__item">
            <a href="javascript:void(0)" class="social-icon__link">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon__link">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon__link">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon__link">
              <i class="fab fa-flickr"></i>
            </a>
            <a href="javascript:void(0)" class="social-icon__link">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </div>
        </div>
      </div>
      <div>
        <div class="contacts__social-icon">
          <i class="fab fa-twitter"></i>
        </div>
        <p class="contacts__intro">
          Unerdwear cookie liquorice. Cake donut cupcake lollipop soufflé candy. Chocolate oat cake
          <span class="contacts__email">@cheesecake</span> tootsie roll.
        </p>
      </div>
    </div>
  </section>
  <section class="container partners">
    <?php foreach (getPartner() as $post): ?>
      <div class="partners__logo">
        <img src="<?php echo get_field('partner_image', $post->ID); ?>" alt="Our partner">
      </div>
    <?php endforeach; ?>
  </section>

<?php get_footer(); ?>