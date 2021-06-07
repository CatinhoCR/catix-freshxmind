<?php

/**
 * FreshXMind Theme Customizer
 *
 * @package     FreshXMind
 * @author      Cato
 * @copyright   Copyright (c) 2021, FreshXMind
 * @since       FreshXMind 1.0.0
 * @see https://developer.wordpress.org/themes/customize-api/customizer-objects/
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Customizer Loader
 */
if (!class_exists('Fxm_Customizer')) {

  /**
   * Customizer Loader
   *
   * @since 1.0.0
   */
  class Fxm_Customizer
  {

    /**
     * Instance
     *
     * @access private
     * @var object
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
      // add_action( 'customize_register', array( $this, 'customize_default_sections' ), 2 );
      add_action('customize_register', array($this, 'customize_register_panel'));
    }

    /**
     * Register custom section and panel.
     *
     * @since 1.0.0
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function customize_register_panel($wp_customize)
    {
      // Add Colors Section
      $wp_customize->add_section(
        'colors',
        array(
          'title' => __('Colors', 'fxm'),
          'priority' => 20,
        )
      );
      // Add Color Settings
      $wp_customize->add_setting(
        'fxm_primary_color',
        array(
          'default' => '#9e3226',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      $wp_customize->add_setting(
        'fxm_secondary_color',
        array(
          'default' => '#070a17',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      // Custom Controls
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'fxm_primary_color',
          array(
            'label' => __('Main Layout Color', 'fxm'),
            'description' => __('Main color used for buttons and other layout options', 'fxm'),
            'section' => 'colors',
            'settings' => 'fxm_primary_color',
          )
        )
      );
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'fxm_secondary_color',
          array(
            'label' => __('Secondary Layout Color', 'fxm'),
            'description' => __('Secondary color used for buttons and other layout options', 'fxm'),
            'section' => 'colors',
            'settings' => 'fxm_secondary_color',
          )
        )
      );

    }

    /**
     * @deprecated
     */
    public function customize_default_sections($wp_customize)
    {
      // Move Homepage Settings section underneath the "Site Identity" section
      $wp_customize->get_section('title_tagline')->priority = 1;
      $wp_customize->get_section('static_front_page')->priority = 2;
    }
  }
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Fxm_Customizer::get_instance();
