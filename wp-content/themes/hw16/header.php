<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
  </head>

  <body>
    <header class="header">
      <div class="container header__container">
        <nav class="site-navigation" aria-label="Menu">
          <label for="site-navigation__toggle-menu" aria-label="Menu">
            <i class="site-navigation__icon fas fa-bars"></i>
          </label>
          <input id="site-navigation__toggle-menu" type="checkbox">
          <?php wp_nav_menu(array	(
              'container'       => 'ul',
              'container_class' => 'site-navigation',
              'menu_class'      => 'main-menu',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'depth'           => 0)
          ); ?>
        </nav>
        <div>
          <img src="<?php bloginfo('template_url'); ?>/img/square-header-logo.png" class="header__logo-company" alt="Square logo">
        </div>
        <ul class="header__social-icons">
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fab fa-flickr"></i>
            </a>
          </li>
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li class="social-icon  header__social-icon">
            <a href="javascript:void(0)" class="link social-icon__link">
              <i class="fas fa-envelope"></i>
            </a>
          </li>
        </ul>
      </div>
    </header>
    <main>