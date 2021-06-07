<?php

/**
 * Core Files refer to main theme's functions
 * Made to customize/extend built-in WP functions and theming
 *
 * @package FreshXMind
 * @author Cato
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$core_includes = [
  // Custom Navigation Walker Functions
  'inc/core/class-navigation-walker.php',
  // Custom Colors and Branding Settings
  'inc/core/color-settings.php',
  // Enqueue / Dequeue Assets
  'inc/core/enqueue-assets.php',
  // Custom Theme Actions and Hooks
  'inc/core/theme-hooks.php',
  // Custom Admin Customization Functions Menus
  'inc/core/admin-functions.php',
  // Custom Post Types, Taxonomies, Widgets, etc
  'inc/core/post_types.php',
  'inc/core/taxonomies.php',
  'inc/core/sidebar-manager.php',
  'inc/core/sidebars.php',
];

foreach ($core_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
