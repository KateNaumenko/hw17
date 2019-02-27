<?php
$comments = get_comments(array(
  'post_id' => get_the_ID(),
  'hierarchical' => true ));

 foreach ($comments as $comment): ?>

  <div class="comment">
    <div class="comment__top">
      <div class="comment__top-right">
        <p class="comment__user-name">
          <?php echo $comment->comment_author; ?>
        </p>
        <div class="comment__date">
          <?php echo $comment->comment_date; ?>
        </div>
      </div>
      <div class="comment__reply-container">
        <button type="button" class="comment__reply">
          <i class="fas fa-undo-alt"></i>
          <?php echo $comment->comment_parent; ?> Reply
        </button>
      </div>
    </div>
    <div class="comment__user">
      <i class="fas fa-user"></i>
    </div>
    <div class="comment__text">
      <p>
        <?php echo $comment->comment_content; ?>
      </p>
    </div>
  </div>
<?php endforeach; ?>

