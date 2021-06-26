<?php

/**
 * Core Files refer to main theme's functions
 * Made to customize/extend built-in WP functions and theming
 *
 * @package Ditso
 * @author Cato
 * @since version 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$core_includes = [
  'inc/core/template-tags.php',
  'inc/core/template-functions.php',
  'inc/core/sidebars.php',
  'inc/core/theme-hooks.php',
];

foreach ($core_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'Ditso'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
