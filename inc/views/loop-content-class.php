<?php

/**
 * FreshXMind Loop
 *
 * @package Ditso_Catix
 * @author Cato
 * @since 1.0.0
 * @see wp-content/themes/astra/inc/class-astra-loop.php
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!class_exists('Fxm_Loop')) :

	/**
	 * Fxm_Loop
	 *
	 * @since 1.2.7
	 */
	class Fxm_Loop
	{

		/**
		 * Instance
		 *
		 * @since 1.2.7
		 *
		 * @access private
		 * @var object Class object.
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.2.7
		 *
		 * @return object initialized object of class.
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
		 *
		 * @since 1.2.7
		 */
		public function __construct()
		{
			// Loop.
			add_action('fxm_content_loop', array($this, 'content_loop_markup'));
			add_action( 'fxm_content_page_loop', array( $this, 'page_loop_markup' ) );

			// Template Parts.
			add_action( 'fxm_page_template_parts_content', array( $this, 'template_parts_page' ) );
			// add_action( 'fxm_page_template_parts_content', array( $this, 'template_parts_comments' ), 15 );
			add_action( 'fxm_template_parts_content', array( $this, 'template_parts_post' ) );
			// add_action( 'fxm_template_parts_content', array( $this, 'template_parts_search' ) );
			add_action( 'fxm_template_parts_content', array( $this, 'template_parts_default' ) );
			// add_action( 'fxm_template_parts_content', array( $this, 'template_parts_comments' ), 15 );

			// Template None.
			// add_action( 'fxm_template_parts_content_none', array( $this, 'template_parts_none' ) );
			// add_action( 'fxm_template_parts_content_none', array( $this, 'template_parts_404' ) );
			// add_action( 'fxm_404_content_template', array( $this, 'template_parts_404' ) );

			// Content top and bottom.
			// add_action( 'fxm_template_parts_content_top', array( $this, 'template_parts_content_top' ) );
			// add_action( 'fxm_template_parts_content_bottom', array( $this, 'template_parts_content_bottom' ) );

			// Add closing and ending div 'ast-row'.
			// add_action( 'fxm_template_parts_content_top', array( $this, 'fxm_templat_part_wrap_open' ), 25 );
			// add_action( 'fxm_template_parts_content_bottom', array( $this, 'fxm_templat_part_wrap_close' ), 5 );
		}

		/**
		 * Template part none
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_none()
		{
			if (is_archive() || is_search()) {
				get_template_part('template-parts/content', 'none');
			}
		}

		/**
		 * Template part 404
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_404()
		{
			if (is_404()) {
				get_template_part('template-parts/content', '404');
			}
		}

		/**
		 * Template part page
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_page()
		{
			get_template_part('template-parts/content', 'page');
		}

		/**
		 * Template part single
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_post()
		{
			if (is_single()) {
				get_template_part('template-parts/content', 'single');
			}
		}

		/**
		 * Template part search
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_search()
		{
			if (is_search()) {
				get_template_part('template-parts/content', 'blog');
			}
		}

		/**
		 * Template part comments
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_comments()
		{
			if (is_single() || is_page()) {
				// If comments are open or we have at least one comment, load up the comment template.
				if (comments_open() || get_comments_number()) :
					comments_template();
				endif;
			}
		}

		/**
		 * Template part default
		 *
		 */
		public function template_parts_default()
		{
			if (!is_page() && !is_single() && !is_search() && !is_404()) {
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', fxm_get_post_format() );
			}
		}

		/**
		 * Loop Markup for content page
		 *
		 */
		public function page_loop_markup()
		{
			$this->content_loop_markup(true);
		}

		/**
		 * Template part loop
		 *
		 * @param  boolean $is_page Loop outputs different content action for content page and default content.
		 *         true - do_action( 'fxm_page_template_parts_content' );
		 *         false - do_action( 'fxm_template_parts_content' );
		 * @since 1.2.7
		 * @return void
		 */
		public function content_loop_markup($is_page = false)
		{
			if (have_posts()) :
				do_action('fxm_template_parts_content_top');

				while (have_posts()) :
					the_post();

					if (true === $is_page) {
						do_action('fxm_page_template_parts_content');
					} else {
						do_action('fxm_template_parts_content');
					}

				endwhile;
				do_action('fxm_template_parts_content_bottom');
			else :
				do_action('fxm_template_parts_content_none');
			endif;
		}

		/**
		 * Template part content top
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_content_top()
		{
			if (is_archive()) {
				fxm_content_while_before();
			}
		}

		/**
		 * Template part content bottom
		 *
		 * @since 1.2.7
		 * @return void
		 */
		public function template_parts_content_bottom()
		{
			if (is_archive()) {
				fxm_content_while_after();
			}
		}

		/**
		 * Add wrapper div 'row' for FreshXMind template part.
		 *
		 * @since  1.2.7
		 * @return void
		 */
		public function fxm_templat_part_wrap_open()
		{
			if (is_archive() || is_search() || is_home()) {
				echo '<div class="row">';
			}
		}

		/**
		 * Add closing wrapper div for 'row' after FreshXMind template part.
		 *
		 * @since  1.2.7
		 * @return void
		 */
		public function fxm_templat_part_wrap_close()
		{
			if (is_archive() || is_search() || is_home()) {
				echo '</div>';
			}
		}
	}

	/**
	 * Initialize class object with 'get_instance()' method
	 */
	Fxm_Loop::get_instance();

endif;
