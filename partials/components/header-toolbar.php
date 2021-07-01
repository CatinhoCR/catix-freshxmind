<?php

/**
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<div class="header__toolbar">
  <div class="header__inner justify-content-end">
    <?php
    $args = array(
      'theme_location' => 'utilities',
      'container' => 'ul',
      'menu_class' => 'toolbar__menu'
    );
    wp_nav_menu($args);
    ?>
  </div>
</div>