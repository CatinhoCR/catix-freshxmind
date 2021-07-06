<?php

/**
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<div class="header__toolbar">
  <div class="header__inner">
    <?php
    $args = array(
      'theme_location'  => 'utilities',
      'container'       => 'ul',
      'menu_class'      => 'nav nav--inline nav--dark',
    );
    wp_nav_menu($args);
    ?>
  </div>
</div>