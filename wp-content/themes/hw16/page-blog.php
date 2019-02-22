<?php
/* Template Name: Page Blog*/
?>

<?php get_header(); ?>


<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
  'posts_per_page' => 6,
  'paged' => $paged,
  'post_type' => 'client'
);

$custom_query = new WP_Query( $args );
?>

  <section class="container top">
    <div class="blog">
    <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <div class="blog__post blog__light-post">
          <div class="blog__img">
            <img src="<?php the_field('client'); ?>" alt="Your image for post" class="img">
          </div>
          <div class="blog__content">
            <div class="blog__content-top">
              <h2 class="blog__title">
                <?php the_title(); ?>
              </h2>
              <?php the_content(); ?>
           </div>
            <div class="blog__btn">
              <a href="<?php the_permalink(); ?>" class="link blog__btn-link">
                Read more
              </a>
            </div>
            <div class="blog__content-bottom">
              <div class="blog__date">
                <i class="far fa-calendar blog__content-bottom-icon"></i>
                <?php echo the_date(); ?>
              </div>
              <div class="blog__comment-counter">
                <i class="fas fa-comment blog__content-bottom-icon"></i>
                24
              </div>
            </div>
          </div>
        </div>
    <?php endwhile; ?>
    </div>
  </section>

  <?php if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
  } ?>

  <div class="up container">
    <a class="link up__link" href="#">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>

<?php get_footer(); ?>