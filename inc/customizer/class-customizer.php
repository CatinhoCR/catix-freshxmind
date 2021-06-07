<?php

/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    FreshXMind
 * @author Cato
 * @since 1.0.0
 */

/**
 * @todo Make a Class
 */
if (!function_exists('fxm_customize_register')) {
  function fxm_customize_register($wp_customize)
  {
    // All the Customize Options you create goes here
  }
  add_action('customize_register', 'fxm_customize_register');
}
