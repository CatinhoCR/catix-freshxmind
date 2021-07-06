<?php

/**
 * Ditso functions and definitions.
 * Text Domain: fxm
 * When using a child theme (see https://codex.wordpress.org/Theme_Development
 * and https://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * For more information on hooks, actions, and filters,
 * see https://codex.wordpress.org/Plugin_API
 *
 * Ditso is a very powerful theme and virtually anything can be customized
 * via a child theme.
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * FXM_After_Setup_Theme initial setup
 *
 * @since 1.0.0
 */
if (!class_exists('FXM_After_Setup_Theme')) {

	/**
	 * FXM_After_Setup_Theme initial setup
	 */
	class FXM_After_Setup_Theme
	{

		/**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.0
		 * @return object
		 */
		public static function get_instance()
		{
			if (!isset(self::$instance)) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct()
		{
			add_action('after_setup_theme', array($this, 'setup_theme'), 2);
			add_action('wp', array($this, 'setup_content_width'));

			// @see moved to template-tags.php
			// add_action( 'wp_body_open', array($this, 'fxm_skip_link'), 5 );

			// Assets
			add_action('wp_enqueue_scripts', array($this, 'fxm_enqueue_css'));
			add_action('wp_enqueue_scripts', array($this, 'fxm_enqueue_js'));

			// Menus
			add_action('after_setup_theme', array($this, 'fxm_register_menus'), 10);
		}

		/**
		 * Setup theme
		 *
		 * @since 1.0.0
		 */
		public function setup_theme()
		{

			do_action('fxm_class_loaded');

			/**
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * @note Work in Progress
			 * @todo Create workflow for managing translations and pot files
			 */
			load_theme_textdomain('fxm', trailingslashit(get_template_directory()) . '/languages');

			/**
			 * Theme Support
			 */

			// Gutenberg wide images.
			add_theme_support('align-wide');

			// Add default posts and comments RSS feed links to head.
			add_theme_support('automatic-feed-links');

			// Let WordPress manage the document title.
			add_theme_support('title-tag');

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support('post-thumbnails');

			// Switch default core markup for search form, comment form, and comments.
			// to output valid HTML5.
			// Added a new value in HTML5 array 'navigation-widgets' as this was introduced in WP5.5 for better accessibility.
			add_theme_support(
				'html5',
				array(
					'navigation-widgets',
					'search-form',
					'gallery',
					'caption',
					'comment-form',
					'comment-list',
					'style',
					'script',
				)
			);

			// Post formats.
			add_theme_support(
				'post-formats',
				array(
					'gallery',
					'image',
					'link',
					'quote',
					'video',
					'audio',
					'status',
					'aside',
				)
			);

			// Add theme support for Custom Logo.
			add_theme_support(
				'custom-logo',
				array(
					'width'       => 400,
					'height'      => 180,
					'flex-width'  => true,
					'flex-height' => true,
					'header-text' => array('site-name'),
					'unlink-homepage-logo' => true,
				)
			);

			// Customize Selective Refresh Widgets.
			add_theme_support('customize-selective-refresh-widgets');

			// WooCommerce.
			add_theme_support('woocommerce');

			// Native AMP Support.
			if (true === apply_filters('fxm_amp_support', true)) {
				add_theme_support(
					'amp',
					apply_filters(
						'fxm_amp_theme_features',
						array(
							'paired' => true,
						)
					)
				);
			}
		}

		/**
		 * Set the $content_width global variable used by WordPress to set image dimennsions.
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function setup_content_width()
		{
			// @todo
		}

		/**
		 * Enqueue CSS
		 */
		public function fxm_enqueue_css()
		{
			wp_enqueue_style(
				'main-css',
				get_template_directory_uri() . '/build/main.css',
				null,
				filemtime(get_stylesheet_directory() . '/build/main.css'),
				false
			);
		}

		/**
		 * Enqueue Scripts
		 */
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

		/**
		 * Register Menus
		 * Register navigation menus uses wp_nav_menu in five places.
		 */
		public function fxm_register_menus()
		{
			$locations = array(
				'primary' 	=> __('Primary Menu', 'fxm'),
				'utilities' => __('Utilities Menu', 'fxm'),
				'mobile' 	 	=> __('Mobile Hamburger Menu', 'fxm'),
				'footer' 	 	=> __('Footer Menu', 'fxm'),
				'social'   	=> __( 'Social Menu', 'twentytwenty' ),
			);
			register_nav_menus($locations);
		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
FXM_After_Setup_Theme::get_instance();
