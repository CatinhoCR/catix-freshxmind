<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 * Wrapper Start
 * Wrapper End
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Wrapper Start
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_wrapper_start')) {
  function fxm_wrapper_start()
  {
    get_template_part('partials/wrappers/wrapper', 'start');
  }
  add_action('fxm_content_before', 'fxm_wrapper_start', 10);
}

/**
 * Wrapper End
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_wrapper_end')) {
  function fxm_wrapper_end()
  {
    get_template_part('partials/wrappers/wrapper', 'end');
  }
  add_action('fxm_content_after', 'fxm_wrapper_end', 10);
}