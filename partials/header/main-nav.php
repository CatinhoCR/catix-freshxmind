<?php

/**
 * Header Bottom Main Navbar
 *
 * @author Cato
 * @package fxm
 * @since 1.0.0
 *
 */
?>

<div class="header__navbar">
  <div class="header__inner">
    <div class="header__brand">
      <!-- cstom logo -->
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