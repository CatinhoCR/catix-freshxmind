<?php

/**
 *
 * Theme's functions hooked to WP
 * @see 'inc/core/theme-hooks.php'
 * @package Ditso_Catix
 *
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$view_classes = [
  'inc/views/main-header-class.php',
  'inc/views/loop-content-class.php',
  'inc/views/main-footer-class.php',
  // 'inc/views/.php',
];

foreach ($view_classes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'Ditso'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
