<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
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
  add_action('fxm_before_main_content', 'fxm_wrapper_start', 10);
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
  add_action('fxm_after_main_content', 'fxm_wrapper_end', 10);
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
