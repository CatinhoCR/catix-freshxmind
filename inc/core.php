<?php

/**
 * Core Files refer to main theme's functions made to customize/extend built-in WP functions
 * For any custom made function use @todo
 *
 * @package fxm
 * @author CATO
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$core_includes = [
  // Custom Navigation Walker Functions
  'inc/core/class-navigation-walker.php',
  // Custom Menus, Widgets, Post Types, etc
  'inc/core/admin-functions.php',
  // Custom Colors and Branding Settings
  'inc/core/color-settings.php',
  // Enqueue / Dequeue Assets
  'inc/core/enqueue-assets.php',
  // Custom Theme Actions and Hooks
  'inc/core/theme-hooks.php',
  // 'inc/core/class-.php',
];

foreach ($core_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}

// $core_includes = [
  // 'inc/core/class-navigation-walker.php',
  // 'inc/core/admin-functions.php',
  // 'inc/core/enqueue-assets.php',
  // 'inc/core/theme-hooks.php',
  // 'inc/core/class-admin-settings.php',
  // 'inc/core/class-.php',
// ];
