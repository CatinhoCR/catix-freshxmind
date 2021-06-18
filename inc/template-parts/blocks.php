<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Back to top Button
 */
if (!function_exists('show_back_top_btn')) {
	function show_back_top_btn()
	{
		get_template_part('partials/blocks/back-to-top');
	}
	add_action('fxm_body_bottom', 'show_back_top_btn');
}
