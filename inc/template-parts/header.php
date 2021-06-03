<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Wrapper Start
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
 * Wrapper Start
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
	// add_action('fxm_header_bottom', 'fxm_header_bottom_content', 10);
}
