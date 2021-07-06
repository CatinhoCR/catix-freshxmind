<?php

/**
 * freshxmind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Ditso_Catix
 * @see wp-includes/template.php for locate_template() source
 * @internal Please note that missing files will produce a fatal error.
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('FXM_THEME_VERSION', '1.0.0');
define('FXM_THEME_SETTINGS', 'fxm-settings');
define('FXM_THEME_DIR', trailingslashit(get_template_directory()));
define('FXM_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));

/**
 * Theme's functions
 */
$includes = [
  // Setup helper functions
  'inc/helpers.php',
  // Theme Setup Functions and definitions
  'inc/theme-setup.php',
  // Theme Hooks, admin functions, template tags & functions
  'inc/core.php',
  // Actions, Filters and Views
  'inc/theme-views.php',
  // Markup & Other Custom Functions
  'inc/methods.php',
  // Customizer API Theme Options
  'inc/customizer.php',
  // Plugins Compat & Extends
  'inc/plugins.php',
];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
