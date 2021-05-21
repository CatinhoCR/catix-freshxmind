<?php
/**
 * FreshXmind functions and definitions.
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
 * FxM is a very powerful theme and virtually anything can be customized
 * via a child theme.
 *
 * @package     freshxmind
 * @author      Cato
 * @copyright   Copyright (c) 2021, CATIX
 * @link        https://cato506.com/
 * @since       FreshXMind 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Fxm_After_Setup_Theme initial setup
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Fxm_After_Setup_Theme' ) ) {

	/**
	 * Fxm_After_Setup_Theme initial setup
	 */
	class Fxm_After_Setup_Theme {

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
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

    /**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup_theme' ), 2 );
			add_action( 'wp', array( $this, 'setup_content_width' ) );
		}

    /**
		 * Setup theme
		 *
		 * @since 1.0.0
		 */
		public function setup_theme() {

      do_action( 'fxm_class_loaded' );

      /**
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
       * @note Work in Progress
       * @todo Create workflow for managing translations and pot files
			 */
			load_theme_textdomain( 'fxm', FXM_THEME_DIR . '/languages' );

      /**
			 * Theme Support
			 */

			// Gutenberg wide images.
			add_theme_support( 'align-wide' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

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
					'width'       => 180,
					'height'      => 60,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			// Customize Selective Refresh Widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

      // WooCommerce.
			add_theme_support( 'woocommerce' );

			// Native AMP Support.
			if ( true === apply_filters( 'fxm_amp_support', true ) ) {
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
		public function setup_content_width() {

    }
  }
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Fxm_After_Setup_Theme::get_instance();