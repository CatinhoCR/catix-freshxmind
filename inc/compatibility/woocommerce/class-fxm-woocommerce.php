<?php

/**
 * WooCommerce Compatibility and Customizations
 *
 * @link https://woocommerce.com/
 *
 * @package FreshXMind
 * @since 1.0.0
 */

if (!defined('ABSPATH') || !is_woocommerce_activated()) {
	exit; // Exit if accessed directly.
}

/**
 * Fresh X Mind WooCommerce Compatibility
 */
if (!class_exists('Fxm_Woocommerce')) :

	/**
	 * Fresh X Mind WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Fxm_Woocommerce
	{

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
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

			// WC Hooks to remove/override output
			add_action('woocommerce_before_main_content', array($this, 'before_main_content_start'));
			add_action('woocommerce_after_main_content', array($this, 'before_main_content_end'));
			// add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );
		}

		/**
		 * Enqueue stylesheets
		 *
		 * @since 1.0.0
		 */
		public function add_styles()
		{
		}

		/**
		 * Register Customizer sections and panel for woocommerce
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register($wp_customize)
		{
		}

		/**
		 * Add start of wrapper
		 */
		public function before_main_content_start()
		{
			$site_sidebar = fxm_page_layout();
			if ('left-sidebar' == $site_sidebar) {
				get_sidebar();
			}
?>
			<div id="primary" class="content-area primary">

				<?php fxm_content_top(); ?>

				<main id="main" class="site-main">
					<div class="fxm-woocommerce-container">
					<?php
				}

				/**
				 * Add end of wrapper
				 */
				public function before_main_content_end()
				{
					?>
					</div> <!-- .fxm-woocommerce-container -->
				</main> <!-- #main -->

				<?php fxm_content_after(); ?>

			</div> <!-- #primary -->
<?php
					$site_sidebar = fxm_page_layout();
					if ('right-sidebar' == $site_sidebar) {
						get_sidebar();
					}
				}

				/**
				 * Remove WooCommerce Default Actions
				 * To be replaced by custom content
				 */
				public function woocommerce_init()
				{
					remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
					remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
					remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
					remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
					remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
					remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
					remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
				}
			}
		endif;

		if (apply_filters('fxm_enable_woocommerce_integration', true)) {
			Fxm_Woocommerce::get_instance();
		}
