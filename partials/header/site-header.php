<?php

/**
 * Main Site Header
 */
$options = $args;
// echo var_dump($options);
?>
<?php
// @todo
// if (get_field('show_top_bar', 'option')) :
//   get_template_part('resources/blocks/site-banners/notice', 'banners', ['position' => 'top']);
// endif;
?>
<header class="site-header" id="siteHeader">
  <?php
  // Top Toolbar
  if ($options['toolbar']) {
    fxm_header_top();
  }
  ?>
  <?php
  // Main Site Navbar
  fxm_header_bottom();
  ?>
</header>