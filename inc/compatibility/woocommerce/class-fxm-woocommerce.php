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
if ( ! class_exists( 'Fxm_Woocommerce' ) ) :

	/**
	 * Fresh X Mind WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Fxm_Woocommerce {

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
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
		public function __construct() {}
  }
endif;

if ( apply_filters( 'fxm_enable_woocommerce_integration', true ) ) {
	Fxm_Woocommerce::get_instance();
}
