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
if (!function_exists('fxm_header_before_content')) {
	function fxm_header_before_content() {

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
	function fxm_header_after_content() {

	}
	add_action('fxm_header_after', 'fxm_header_after_content', 10);
}

/**
 * Wrapper Start
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_top_content')) {
	function fxm_header_top_content() {

	}
	add_action('fxm_header_top', 'fxm_header_top_content', 10);
}

/**
 * Wrapper Start
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_header_bottom_content')) {
	function fxm_header_bottom_content() {

	}
	add_action('fxm_header_bottom', 'fxm_header_bottom_content', 10);
}
