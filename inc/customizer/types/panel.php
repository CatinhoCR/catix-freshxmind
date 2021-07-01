<?php

/**
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (!class_exists('Fxm_Customizer_Panel')) :

  /**
   * Loader - Customizer
   *
   * @since 1.0.0
   */
  class Fxm_Customizer_Panel
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
    protected $wpc;

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
      add_action('customize_register', array($this, 'customize_register_panel'));

      // add_action('customize_register', array($this, 'customize_register'));
    }

    // Add Theme Options Panel
    // $wp_customize->add_panel(
    //   'fxm_theme_options_panel',
    //   array(
    //     'title' => __('Theme Options', 'fxm'),
    //     'description' => __('', 'fxm'), //Descriptive tooltip
    //     'priority' => 10,
    //   )
    // );

    /**
     *
     */
    public function customize_register_panel($wp_customize)
    {
      $this->wpc = $wp_customize;
      $this->register_customizer_panel();
    }

    /**
     *
     */
    public function register_customizer_panel($id = '', $title = '', $desc = '', $priority = 10)
    {
      // @todo make dynamic
      // $this->wpc->add_panel(
      //   '',
      //   array(
      // '' => __('', 'fxm'),
      //   )
      // );

      $this->wpc->add_panel(
        'fxm_theme_options_panel',
        array(
          'title' => __('Theme Options', 'fxm'),
          'description' => __('', 'fxm'), //Descriptive tooltip
          'priority' => 10,
        )
      );
    }
  }
endif;

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Fxm_Customizer_Panel::get_instance();
