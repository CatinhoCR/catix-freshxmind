<?php

/**
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Fetch needed stuff

$toolbar = $args['toolbar'];
?>
<header class="nav" id="masthead">
  <?php
  if ($toolbar) {
    fxm_header_top();
  }
  ?>

  <?php fxm_header_bottom(); ?>
</header>