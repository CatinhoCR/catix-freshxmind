<?php

/**
 *
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$template_parts_includes = [
  'inc/template-parts/wrappers.php',
  // 'inc/template-parts/.php',
  // 'inc/template-parts/.php'
];

foreach ($template_parts_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
