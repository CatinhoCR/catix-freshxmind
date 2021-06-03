<?php

/**
 * Header Top Toolbar Nav
 * Rendered depending on user selection in admin menu
 *
 * @author Cato
 * @package fxm
 * @since 1.0.0
 *
 */
?>

<div class="header__toolbar">
  <div class="header__inner">
    <?php
    $args = array(
      'theme_location' => 'utilities-top-menu',
      'container' => 'ul',
      'menu_class' => 'toolbar__menu'
    );
    wp_nav_menu($args);
    ?>
  </div>
</div>