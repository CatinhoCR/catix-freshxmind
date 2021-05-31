<?php

/**
 * Main Site Header
 */
$options = $args;
// echo var_dump($options);
?>
<header class="site-header" id="siteHeader">
  <?php
    if ($options['toolbar']) {
      fxm_header_top();
    }
  ?>
  <?php fxm_header_bottom(); ?>
</header>