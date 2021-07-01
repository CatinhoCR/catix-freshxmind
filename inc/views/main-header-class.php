<?php

/**
 * FreshXMind Header Functions
 * Functions which enhance the theme by hooking into WordPress
 *
 * @see https://developer.wordpress.org/reference/functions/get_template_part/
 * @package Ditso
 * @author Cato
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (!class_exists('Fxm_Header')) :

  /**
   * Fxm_Header
   *
   * @since 1.0.0
   */
  class Fxm_Header
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
      // Head Functions / Actions
      add_action('fxm_head_top', array($this, 'fxm_head_top_content'), 10);
      add_action('fxm_head_bottom', array($this, 'fxm_head_bottom_content'), 10);


      // Header Actions / Functions
      add_action('fxm_header_before', array($this, 'fxm_header_before_content'), 10);
      add_action('fxm_header_after', array($this, 'fxm_header_after_content'), 10);
      add_action('fxm_header_top', array($this, 'fxm_header_top_content'), 10);
      add_action('fxm_header_bottom', array($this, 'fxm_header_bottom_content'), 10);
      add_action('fxm_site_header', array($this, 'fxm_main_site_header'), 10);
    }

    /**
     * Head Top content
     * Content inside <head>
     */
    public function fxm_head_top_content()
    {
      // get_template_part('partials/head/head', 'top');
    }

    /**
     * Head Bottom content
     * Content inside <head>
     */
    public function fxm_head_bottom_content()
    {
      // get_template_part('partials/head/head', 'bottom');
    }

    /**
     *
     */
    public function fxm_header_before_content()
    {
      // Add any template or code your theme needs before the header here
    }

    /**
     *
     */
    public function fxm_header_after_content()
    {
    }

    /**
     *
     */
    public function fxm_header_top_content()
    {
      // get_template_part('partials/header/top', 'toolbar');
    }

    /**
     *
     */
    public function fxm_header_bottom_content()
    {
      // get_template_part('partials/header/main', 'nav');
    }

    /**
     *
     */
    public function fxm_main_site_header()
    {
      // $show_toolbar = (get_field('show_top_toolbar', 'option')) ? true : false;
      // $settings = [
      //   'toolbar' => $show_toolbar
      // ];
      // get_template_part('partials/header/site', 'header', $settings);
    }
  }

  /**
   * Initialize class object with 'get_instance()' method
   */
  Fxm_Header::get_instance();

endif;
