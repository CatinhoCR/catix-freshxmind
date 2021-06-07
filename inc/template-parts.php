<?php

/**
 *
 * @package fxm
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$template_parts_includes = [
  'inc/template-parts/wrappers.php',
  'inc/template-parts/header.php',
  'inc/template-parts/footer.php',
  // 'inc/template-parts/.php',
];

foreach ($template_parts_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fxm'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
