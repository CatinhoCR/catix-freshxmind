<?php

/**
 * Header Bottom Main Navbar
 *
 * @author Cato
 * @package fxm
 * @since 1.0.0
 *
 */
$nav_layout = get_field('main_navigation_style', 'option');
$theme_color = get_field('dark_light_version', 'option');
$logo_args = [
  'style' => 'normal',
  'color' => ($theme_color === 'light') ? 'dark' : 'light',
  'version' => 'both'
];
?>

<div class="header__navbar">
  <div class="header__inner">
    <div class="header__brand">
      <?php get_template_part('partials/components/brand', 'logo', $logo_args); ?>
    </div>
    <div class="header__menu">
      <?php
      $args = array(
        'theme_location' => 'primary-menu',
        'container' => 'ul',
        'menu_class' => 'header__nav',
        'walker' => new FreshXMind_Custom_Megamenu()
      );
      wp_nav_menu($args);
      ?>
    </div>
  </div>
</div>