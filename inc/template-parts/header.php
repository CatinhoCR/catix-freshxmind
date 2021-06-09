<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @see https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Head Top content
 */
if (!function_exists('fxm_head_top_content')) {
	function fxm_head_top_content()
	{
		// get_template_part('partials/head/head', 'top');
	}
	add_action('fxm_head_top', 'fxm_head_top_content', 10);
}

/**
 * Add Google Analytics Support and Snippet to Head
 *
 * @return void
 * @since  1.0
 * @author CATO
 */
if (!function_exists('fxm_head_gtag_support')) {
	function fxm_head_gtag_support()
	{
		if (!get_field('add_google_analytics_tag', 'option')) {
			return;
		}
		$gtag_id = get_field('google_analytics_tag_id', 'option');
		get_template_part('partials/head/google', 'tag', $gtag_id);
	}
	add_action('fxm_head_bottom', 'fxm_head_gtag_support', 10);
}


/**
 *
 */
if (!function_exists('fxm_head_css_vars_support')) {
  function fxm_head_css_vars_support()
  {
    $colors_site = fxm_get_theme_colors();
		get_template_part('partials/head/custom', 'styles', $colors_site);
  }
  add_action('fxm_head_bottom', 'fxm_head_css_vars_support', 15);
}


/**
 * Content before Header Tag
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_before_content')) {
	function fxm_header_before_content()
	{
		// Add any template or code your theme needs before the header here
	}
	add_action('fxm_header_before', 'fxm_header_before_content', 10);
}

/**
 * Content After Header Tag
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_after_content')) {
	function fxm_header_after_content()
	{
	}
	add_action('fxm_header_after', 'fxm_header_after_content', 10);
}

/**
 * Main Site's Header Top Toolbar
 * This is optional based on user selections from theme settings
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_top_content')) {
	function fxm_header_top_content()
	{
		get_template_part('partials/header/top', 'toolbar');
	}
	add_action('fxm_header_top', 'fxm_header_top_content', 10);
}

/**
 * Header Main Site's Navigation
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_bottom_content')) {
	function fxm_header_bottom_content()
	{
		get_template_part('partials/header/main', 'nav');
	}
	add_action('fxm_header_bottom', 'fxm_header_bottom_content', 10);
}

/**
 * Custom Logo
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_custom_logo')) {
	function fxm_custom_logo()
	{
		get_template_part('partials/header/custom', 'logo');
		// get_template_part('partials/header/main', 'nav');
	}
	// add_action('fxm_header_bottom', 'fxm_header_bottom_content', 10);
}

/**
 * Main Site Header Wrapper Function
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_main_site_header')) {
	function fxm_main_site_header()
	{
		$show_toolbar = (get_field('show_top_toolbar', 'option')) ? true : false;
		$settings = [
			'toolbar' => $show_toolbar
		];
		get_template_part('partials/header/site', 'header', $settings);
	}
}
