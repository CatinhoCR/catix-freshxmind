<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @see https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Content Wrapper Start
 * @see Partials - Wrappers
 * @see Templates - header.php & footer.php
 *
 * @
 * @since  1.0
 * @author Cato
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

/**
 * Section Wrapper Start
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
// if (!function_exists('fxm_section_wrapper_start')) {
//   add_action('fxm_before_section_content', 'fxm_section_wrapper_start', 99);
//   function fxm_section_wrapper_start($block = '')
//   {
//     get_template_part('partials/wrappers/section-wrapper', 'start', $block);
//   }
// }

/**
 * Section Wrapper End
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
// if (!function_exists('fxm_section_wrapper_end')) {
//   add_action('fxm_after_section_content', 'fxm_section_wrapper_end', 99);
//   function fxm_section_wrapper_end()
//   {
//     get_template_part('partials/wrappers/section-wrapper', 'end');
//   }
// }
