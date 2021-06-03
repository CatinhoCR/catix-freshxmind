<?php

/**
 * Define common WP plugins' and libs compatibility
 *
 * @package fxm
 * @author CATO
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$compat_includes = [
  // 'inc/compatibility/plugins-compat.php',
  'inc/compatibility/acf-options-page.php',
  // 'inc/compatibility/',
];

foreach ($compat_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
