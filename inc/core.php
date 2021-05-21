<?php

/**
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$core_includes = [
  // 'inc/core/class-navigation-walker.php',
  'inc/core/admin-functions.php',
  'inc/core/enqueue-assets.php',
  'inc/core/theme-hooks.php',
  // 'inc/core/class-admin-settings.php',
  // 'inc/core/class-.php',
];

foreach ($core_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
