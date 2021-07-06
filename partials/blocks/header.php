<?php

/**
 * The Main Header Template Layout
 * @see 'inc/views/main-header-class.php'
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
$layout = $args['layout'];
?>
<header class="header" id="masthead">
  <?php fxm_header_top(); ?>

  <?php fxm_header_bottom(); ?>
</header>