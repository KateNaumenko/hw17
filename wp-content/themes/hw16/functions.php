<?php

  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style( 'hw16-main-style', get_template_directory_uri() . '/style.css');
  });

  add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script( 'hw16-sc-script', get_template_directory_uri() . '/js/sc.min.js');
  });

  add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
    function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css' );
  }

  if (function_exists('add_theme_support')) {
    add_theme_support('menus');
  }

  add_action( 'after_setup_theme', 'theme_register_nav_menu' );
    function theme_register_nav_menu() {
      register_nav_menu( 'primary', 'Menu' );
  }


  function create_post_type() {
    register_post_type( 'news',
      array(
        'labels' => array(
          'name' => __( 'News' ),
          'singular_name' => __( 'News' ),
          'add_new'     => __('Add new'),
          'add_new_item' => __('Add new news'),
          'edit_item' => __('Edit news')
        ),
        'public' => true,
        'has_archive' => true,
        'support' => array ('title','editor', 'thumbnail'),
        'query_var' => false
      )
    );

    register_post_type( 'portfolio',
      array(
        'labels' => array(
          'name' => __( 'Portfolio' ),
          'singular_name' => __( 'Portfolio' ),
          'add_new'     => __('Add new'),
          'add_new_item' => __('Add new portfolio'),
          'edit_item' => __('Edit portfolio')
        ),
        'public' => true,
        'has_archive' => true,
        'support' => array ('editor', 'thumbnail'),
        'query_var' => false
      )
    );

    register_post_type( 'client',
      array(
        'labels' => array(
          'name' => __( 'Clients' ),
          'singular_name' => __( 'Client' ),
          'add_new'     => __('Add new'),
          'add_new_item' => __('Add new client'),
          'edit_item' => __('Edit client')
        ),
        'public' => true,
        'has_archive' => true,
        'support' => array ('title','editor', 'thumbnail'),
        'query_var' => false
      )
    );

    register_post_type( 'photo',
      array(
        'labels' => array(
          'name' => __( 'Photos' ),
          'singular_name' => __( 'Photo' ),
          'add_new'     => __('Add new'),
          'add_new_item' => __('Add new photo'),
          'edit_item' => __('Edit photo')
        ),
        'public' => true,
        'has_archive' => true,
        'support' => array ('title','editor', 'thumbnail'),
        'query_var' => false
      )
    );

    register_post_type( 'partner',
      array(
        'labels' => array(
          'name' => __( 'Partners' ),
          'singular_name' => __( 'Partner' ),
          'add_new'     => __('Add new'),
          'add_new_item' => __('Add new partner'),
          'edit_item' => __('Edit partner')
        ),
        'public' => true,
        'has_archive' => true,
        'support' => array ('title','editor', 'thumbnail'),
        'query_var' => false
      )
    );
  }
  add_action( 'init', 'create_post_type' );

  function getNews() {
    $news = array(
      'numberposts' => 3,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'news',
    );

    return get_posts($news);
  }

  function getClient() {
    $client = array(
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'client',
    );

    return get_posts($client);
  }

  function getPhoto() {
    $photo = array(
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'photo',
    );

    return get_posts($photo);
  }

  function getPartner() {
    $partner = array(
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'partner',
    );

    return get_posts($partner);
  }

  function pagination($pages = '', $range = 4)
  {
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages)
      {
        $pages = 1;
      }
    }

    if(1 != $pages)
    {
      echo "<div class=\"pagination\">";
      if($paged > 1) echo "<a href='".get_pagenum_link($paged - 1)."'>Prev</a>";

      for ($i=1; $i <= $pages; $i++)
      {
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
        {
          echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        }
      }

      if ($paged < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next</a>";
      echo "</div>\n";
    }
  }