<?php

/**
 * A
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Register navigation menus
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */

if (!function_exists('fxm_register_nav_menu')) {

  function fxm_register_nav_menu()
  {
    register_nav_menus(array(
      'primary-menu' => __('Primary Menu', 'freshxmind'),
      'utilities-top-menu' => __('Utilities Top Menu', 'freshxmind'),
      'hamburger-menu' => __('Hamburger Menu', 'freshxmind'),
      'footer-menu' => __('Footer Menu', 'freshxmind')
    ));
  }
  add_action('after_setup_theme', 'fxm_register_nav_menu', 0);
}


/**
 * Disable Admin Bar
 * @todo Move to admin-functions folder and files
 */
// show admin bar only for admins and editors
if (!current_user_can('edit_posts') || !current_user_can('activate_plugins')) {
  add_filter('show_admin_bar', '__return_false');
}
