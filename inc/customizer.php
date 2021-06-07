<?php

/**
 * WP Customizer API
 *
 * @package FreshXMind
 * @author Cato
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$customizer_includes = [
  // Custom Navigation Walker Functions
  'inc/customizer/class-theme-customizer.php',
];

foreach ($customizer_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
