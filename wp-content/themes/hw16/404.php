<?php
/*The template for displaying 404 pages (not found)*/

get_header();
?>

	<section id="primary" class="container top">
    <div class="not-found">
      <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'hw16' ); ?></h1>
      <p><?php _e( 'It looks like nothing was found at this location.' ); ?></p>
    </div>
  </section>

<?php get_footer();
