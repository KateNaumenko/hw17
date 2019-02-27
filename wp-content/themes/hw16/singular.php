<?php
/* Template Name: Page Post*/

get_header();

while ( have_posts() ) : the_post();
  $comments = get_comments(array(
    'post_id' => get_the_ID(),
    'hierarchical' => true ));
  ?>

  <section class="container top">
    <div class="post-container">
      <div class="post">
        <div>

          <?php if (isset($_GET["p"])) :
            the_post_thumbnail('post-large',array('class' => 'single-post__img'));
          else: ?>
            <img src="<?php the_field('post_page_image')?>" class="post__main-img">
          <?php endif; ?>

        </div>
        <div class="post__text-container">
          <h3 class="post__topic">
            <?php the_title(); ?>
          </h3>
          <div class="post__group">
            <p class="post__group-item">
              <i class="far fa-calendar"></i>
              <?php the_date() ?>
            </p>
            <p class="post__group-item">
              <i class="fas fa-comment"></i>
              <?php echo count($comments)?>
            </p>
            <p class="post__group-item">
              <i class="fas fa-heart"></i>
              400
            </p>
          </div>
          <p class="post__text">
            <?php the_content(); ?>
          </p>
        </div>
        <div class="post__group-post">
          <div class="post__group-item post__left-group-item">
            <div class="post__share">
              <div class="post__group-item post__group-post-item">
                Share
              </div>
              <div class="post__group-item post__group-post-item">
                <i class="fab fa-facebook-f"></i>
              </div>
              <div class="post__group-item post__group-post-item">
                <i class="fab fa-twitter"></i>
              </div>
              <div class="post__group-item post__group-post-item">
                <i class="fab fa-pinterest-p"></i>
              </div>
            </div>
          </div>
          <div class="post__group-item  post__right-group-item">
            <i class="fas fa-retweet"></i>
          </div>
        </div>
      </div>
      <div class="comments">
        <h3 class="comments__topic">
          <?php echo count($comments)?> Comments
        </h3>

        <?php
        get_template_part('page-templates/comment', 'page');
        ?>

      </div>
      <div>
        <?php var_dump(get_the_ID()); ?>
        <?php
        add_filter( 'comment_form_logged_in', '__return_empty_string' );
        add_filter( 'wp_insert_post_data', 'default_comments_on' );

        $comments_args = array(
          'must_log_in'=> false,
          'label_submit'=>'Send',
          'title_reply'=>'Leave a comment',
          'comment_notes_after' => '',
          'comment_field' => '
                <p class="comment-form-comment">
                  <ul class="list-input">
                    <li class="list-input__item">
                      <input type="text" id="name" name="author" placeholder="Name" class="list-input__field list-input__field--focused">
                    </li>
                    <li class="list-input__item">
                      <input type="email" id="email" name="email" placeholder="E-mail" class="list-input__field list-input__field--focused">
                    </li>
                    <li class="list-input__item">
                      <input type="text" id="website" name="website" placeholder="Web site" class="list-input__field list-input__field--focused">
                    </li>
                    <li class="list-input__item">
                      <input type="text" id="job" name="job" placeholder="Job" class="list-input__field list-input__field--focused">
                    </li>
                    <li class="list-input__item">
                      <textarea rows="10" id="message" name="comment" placeholder="Comment" class="list-input__message list-input__message--focused"></textarea>
                      <button type="submit" class="list-input__submit list-input__submit--hovered">Send</button>
                    </li>
                  </ul>
                </p>',
        );

        comment_form($comments_args, get_the_ID());
        ?>

        <div class="post-container__form-intro">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis semper nisl, vitae malesuada
            massa egestas a. Vestibulum vestibulum urna sapien, eu bibendum magna ornare non.
          </p>
        </div>
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
        REcent post
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
    <div class="block">
      <h3 class="block__title">
        category
      </h3>
      <ul class="block__list">
        <?php wp_list_categories('order=ASC&title_li='); ?>
      </ul>
    </div>
  </section>
  <section class="container partners">

    <?php foreach (getPartner() as $post): ?>

      <div class="partners__logo">
        <img src="<?php echo get_field('partner_image', $post->ID); ?>" alt="Our partner">
      </div>

    <?php endforeach; ?>

  </section>

<?php endwhile;

get_footer(); ?>