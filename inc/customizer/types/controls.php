<?php

/**
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (!class_exists('Fxm_Customizer_Controls')) :

  /**
   * Loader - Customizer
   *
   * @since 1.0.0
   */
  class Fxm_Customizer_Controls
  {
    /**
     * Instance
     *
     * @access private
     * @var object
     */
    private static $instance;

    /**
     * WP_Customize object
     *
     * @var WP_Customize_Manager $wp_customize object
     */
    // protected $wpc;

    /**
     * Selective refresh.
     *
     * @var string transport or postMessage
     */
    // protected $selective_refresh;

    /**
     * Initiator
     *
     * @since 1.0.0
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
     * @since 1.0.0
     */
    public function __construct()
    {
      // add_action('customize_register', array($this, 'customize_register'));
    }
  }
endif;

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Fxm_Customizer_Controls::get_instance();
