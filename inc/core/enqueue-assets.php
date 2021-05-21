<?php

/**
 * Enqueue styles & Scripts
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * @todo Leaving These here for now, for future reference
 * if (is_singular() && comments_open() && get_option('thread_comments')) {}
 * if (is_user_logged_in()) {}
 * wp_deregister_style('');
 */

/**
 * Styles Enqueue Custom General stuff
 */
if (!function_exists('fxm_enqueue_css')) {
	function fxm_enqueue_css()
	{
		wp_enqueue_style(
			'main-css',
			get_template_directory_uri() . '/build/main.css',
			null,
			filemtime(get_stylesheet_directory() . '/build/main.css'),
			false
		);
	}
	add_action('wp_enqueue_scripts', 'fxm_enqueue_css');
}

/**
 *
 */
function fxm_gut_editor_enqueue()
{
	wp_enqueue_script(
		'fxm_gut_editor_enqueue',
		get_template_directory_uri() . '/build/guteditor.js',
		array( 'wp-blocks' )
	);
}
// @todo add_action('enqueue_block_editor_assets', 'fxm_gut_editor_enqueue');

/**
 * Scripts Enqueue Custom General stuff
 */
if (!function_exists('fxm_enqueue_js')) {
	function fxm_enqueue_js()
	{
		wp_enqueue_script(
			'main-js',
			get_template_directory_uri() . '/build/app.js',
			null,
			filemtime(get_stylesheet_directory() . '/build/app.js'),
			true
		);
		// @todo if (is_post_type_archive('book-authors') || !is_admin()) {
		// 	wp_enqueue_script(
		// 		'load-more',
		// 		get_template_directory_uri() . '/src/js/ajax/load-more-posts.js',
		// 		array('jquery'),
		// 		'1.0.0',
		// 		true
		// 	);
		// }
	}
	add_action('wp_enqueue_scripts', 'fxm_enqueue_js');
}

/**
 * @todo
 * Built In WP Styles Removal if not in admin pages
 */
// if (!function_exists('fxm_dequeue_styles') && !is_admin()) {
// 	function fxm_dequeue_styles()
// 	{
// 		if (!is_admin_bar_showing()) {
// 			wp_dequeue_style('dashicons');
// 			wp_deregister_style('dashicons');
// 		}
// 		wp_deregister_style('wp-block-library');
// 		wp_deregister_style('wc-block-vendors-style');
// 		wp_deregister_style('contact-form-7');
// 	}
// 	add_action('wp_enqueue_scripts', 'fxm_dequeue_styles', 100);
// }

/**
 * @todo
 * Built In WP Scripts Removal if not in admin pages
 */
// if (!function_exists('fxm_dequeue_scripts') && !is_admin()) {
// 	function fxm_dequeue_scripts()
// 	{
// 		// wp_dequeue_script('jquery');
// 		wp_dequeue_script('hoverintent-js');
// 		wp_dequeue_script('wp-embed');
// 		// wp_deregister_script('jquery');
// 		wp_deregister_script('hoverintent-js');
// 		wp_deregister_script('wp-embed');
// 		wp_deregister_script('contact-form-7');
// 	}
// 	add_action('wp_enqueue_scripts', 'fxm_dequeue_scripts', 100);
// }
