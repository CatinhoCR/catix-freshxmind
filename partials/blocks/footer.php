<?php

/**
 * The Main Footer Template Layout
 * @see 'inc/views/main-footer-class.php'
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
// @todo
// $show_social = get_field('show_social_networks_area', 'option');
?>
<footer class="site-footer">
  <?php fxm_footer_top(); ?>
  <?php fxm_footer_bottom(); ?>
</footer>
