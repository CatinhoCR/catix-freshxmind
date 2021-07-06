<?php

/**
 * FreshXMind Footer Functions
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

if (!class_exists('Fxm_Footer')) :

  /**
   * Fxm_Footer
   *
   * @since 1.0.0
   */
  class Fxm_Footer
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
      // Footer Actions / Functions
      add_action('fxm_footer_before', array($this, 'fxm_footer_before_content'), 10);
      add_action('fxm_footer_after', array($this, 'fxm_footer_after_content'), 10);
      add_action('fxm_footer_top', array($this, 'fxm_footer_top_content'), 10);
      add_action('fxm_footer_bottom', array($this, 'fxm_footer_bottom_content'), 10);
      add_action('fxm_site_footer', array($this, 'fxm_main_site_footer'), 10);
    }

    /**
     *
     */
    public function fxm_footer_before_content()
    {

      // @todo Add Sub Footer Option and Template for things like
      // Subcribe form
    }

    /**
     *
     */
    public function fxm_footer_after_content()
    {
    }

    /**
     * @see inc/core/theme-hooks.php
     * Hooked to 'fxm_footer_top'
     */
    public function fxm_footer_top_content()
    {
      get_template_part('partials/components/footer/main', 'cols');
    }

    /**
     *
     */
    public function fxm_footer_bottom_content()
    {
      get_template_part('partials/components/footer/legal', 'info');
    }

    /**
     *
     */
    public function fxm_main_site_footer()
    {
      get_template_part('partials/blocks/footer', '');
    }
  }

  /**
   * Initialize class object with 'get_instance()' method
   */
  Fxm_Footer::get_instance();

endif;
