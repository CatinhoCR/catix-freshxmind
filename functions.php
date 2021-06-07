<?php
/**
 * freshxmind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package freshxmind
 * @see wp-includes/template.php for locate_template() source
 * Supports child theme overrides.
 * $includes - root main './inc/files'
 * @internal Please note that missing files will produce a fatal error.
 * @author CATO
 * @since 1.0.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'FXM_THEME_VERSION', '1.0.0' );
define( 'FXM_THEME_SETTINGS', 'fxm-settings' );
define( 'FXM_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'FXM_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Setup helper functions of FreshXMind.
 */
// require_once FXM_THEME_DIR . 'inc/core/class-fxm-theme-options.php';
// require_once FXM_THEME_DIR . 'inc/core/class-theme-strings.php';
// require_once FXM_THEME_DIR . 'inc/core/common-functions.php';
// require_once FXM_THEME_DIR . 'inc/core/class-fxm-icons.php';

$includes = [
  // Setup helper functions
  'inc/common-functions.php',
  // Theme customizations, hooks and extending
  'inc/core.php',
  // Customizer Theme API
  'inc/customizer.php',
  // Theme-wide reusable methods
  'inc/methods.php',
  // Custom template tags for this theme
  'inc/custom-tags.php',
  // Functions and definitions
  'inc/theme-setup.php',
  // Markup Functions
  // @todo functions used by inc/template-parts.php
  // Markup Files
  'inc/template-parts.php',
  // Compatibility
  'inc/compatibility.php',
];


// $includes = [
//   'inc/common-functions.php',
//   'inc/theme-setup.php',
//   'inc/core.php',
//   'inc/template-parts.php',
//   'inc/plugin-compatibility.php'
  // 'inc/compatibility-plugins.php',
  // 'inc/methods.php',
  // 'inc/classes.php',
  // 'inc/taxonomies.php',
  // 'inc/acf-customizations.php',
  // 'inc/woocommerce.php'
// ];

foreach ($includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
