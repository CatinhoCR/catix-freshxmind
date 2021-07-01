<?php

/**
 * Customizer API implementation
 *
 *
 * @package Ditso
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (!class_exists('Fxm_Customizer')) :

  /**
   * Loader - Customizer
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
     * WP_Customize object
     *
     * @var WP_Customize_Manager $this->wpc object
     */
    protected $wpc;

    /**
     * Selective refresh.
     *
     * @var string transport or postMessage
     */
    protected $selective_refresh;

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
      add_action('customize_register', array($this, 'customize_register'));
    }

    /**
     * The function tied to customize_register.
     *
     * @param object $this->wpc the customizer manager.
     */
    // public function customize_register($this->wpc)
    public function customize_register( $wp_customize )
    {
      $this->wpc = $wp_customize;
      // $this->load_config_files();
      //
      $this->register_panels();
      $this->register_sections();
      // Settings
      $this->register_brand_settings();
      $this->register_sidebar_settings();
      $this->register_header_settings();
      // Controls
      $this->register_color_controls();
      $this->register_sidebar_controls();
      $this->register_header_controls();
      // $this->

    }

    /**
     * Panel - Customizer Registration
     */
    public function register_panels()
    {
      $this->wpc->add_panel(
        'fxm_theme_options_panel',
        array(
          'title' => __('Theme Options', 'fxm'),
          'description' => __('Customize the look & feel of your website by changing the default colors.', 'fxm'), //Descriptive tooltip
          'priority' => 30,
        )
      );
    }

    /**
     * Sections - Customizer Registration
     */
    public function register_sections()
    {
      // Colors Section
      $this->wpc->add_section(
        'fxm_color_options',
        array(
          'title'       => __('Branding Color Settings', 'fxm'), //Visible title of section
          'priority'    => 10, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );

      // Sidebar Settings Section
      $this->wpc->add_section(
        'fxm_sidebar_settings',
        array(
          'title'       => __('Sidebar Settings', 'fxm'), //Visible title of section
          'priority'    => 30, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );

      // Site Header Settings Section
      $this->wpc->add_section(
        'fxm_header_settings',
        array(
          'title'       => __('Header Settings', 'fxm'), //Visible title of section
          'priority'    => 20, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );
    }

    /**
     * Color & Logo Settings
     */
    public function register_brand_settings()
    {
      $this->wpc->add_setting(
        'fxm_primary_color',
        array(
          'default' => '#9e3226',
          'sanitize_callback' => 'sanitize_hex_color',
          // 'transport' => 'postMessage' | 'refresh',
        )
      );
      $this->wpc->add_setting(
        'fxm_secondary_color',
        array(
          'default' => '#070a17',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      $this->wpc->add_setting(
        'fxm_link_color',
        array(
          'default' => '#054880',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
    }

    /**
     * Register Sidebar Settings
     * @todo Add Blog, Single Post, Shop, Product, Pages, Archives Options to override the default
     *
     */
    public function register_sidebar_settings()
    {
      $this->wpc->add_setting(
        'fxm_sidebar_default',
        array(
          'default' => 'default-sidebar',
          'sanitize_callback' => '',
          // 'transport' => 'postMessage' | 'refresh',
        )
      );
    }

    /**
     * @todo Make these functions reusable so we can
     * Add settings/controls/etc
     * From other classes (like header)
     */
    public function register_header_settings()
    {
      // Show Top Toolbar
      $this->wpc->add_setting(
        'fxm_show_top_toolbar',
        array(
          'default' => '',
          'sanitize_callback' => '',
          // 'transport' => 'postMessage' | 'refresh',
        )
        );

      // Header Layout Selection
      $this->wpc->add_setting(
        'fxm_header_layout',
        array(
          'default' => 'fixed_mini',
          'sanitize_callback' => '',
          // 'transport' => 'postMessage' | 'refresh',
        )
      );
    }

    /**
     * Color Controls
     */
    public function register_color_controls()
    {
      $this->wpc->add_control(
        new WP_Customize_Color_Control(
          $this->wpc,
          'link_color',
          array(
            'label'      => __('Links Color', 'fxm'),
            'description' => __('Color used for links inside text', 'fxm'),
            'section'    => 'fxm_color_options',
            'settings'   => 'fxm_link_color',
          )
        )
      );
      $this->wpc->add_control(
        new WP_Customize_Color_Control(
          $this->wpc,
          'fxm_primary_color',
          array(
            'label' => __('Main Layout Color', 'fxm'),
            'description' => __('Main color used for buttons and other layout options', 'fxm'),
            'section' => 'fxm_color_options',
            'settings' => 'fxm_primary_color',
          )
        )
      );
      $this->wpc->add_control(
        new WP_Customize_Color_Control(
          $this->wpc,
          'fxm_secondary_color',
          array(
            'label' => __('Secondary Layout Color', 'fxm'),
            'description' => __('Secondary color used for buttons and other layout options', 'fxm'),
            'section' => 'fxm_color_options',
            'settings' => 'fxm_secondary_color',
          )
        )
      );
    }

    /**
     * Sidebar Controls
     */
    public function register_sidebar_controls()
    {
      // Select default Sidebar to show
      $this->wpc->add_control(
        new WP_Customize_Control(
          $this->wpc,
          'default_sidebar_select',
          array(
            'type' => 'select',
            'choices' => array(
              'default' => 'Default',
              'right' => 'Right',
              'left' => 'Left',
              'none' => 'None',
            ),
            'label'      => __('Default Sidebar', 'fxm'),
            'description' => __('Select your website default sidebar layout. You can override this for some pages below.', 'fxm'),
            'section'    => 'fxm_sidebar_settings',
            'settings'   => 'fxm_sidebar_default',
          )
        )
      );
    }

    /**
     * Header Controls
     */
    public function register_header_controls()
    {
      // Show Top Toolbar
      $this->wpc->add_control(
        new WP_Customize_Control(
          $this->wpc,
          'show_top_toolbar_check',
          array(
            'type' => 'checkbox',
            'label'      => __('Show Header Top Toolbar', 'fxm'),
            'description' => __('Check if the Main Header should display the top toolbar.', 'fxm'),
            'section'    => 'fxm_header_settings',
            'settings'   => 'fxm_show_top_toolbar',
          )
        )
      );

      // Header Layout
      $this->wpc->add_control(
        new WP_Customize_Control(
          $this->wpc,
          'header_layout_select',
          array(
            'type' => 'select',
            'choices' => array(
              'fixed_mini' => 'Fixed Top',
              'static' => 'Static',
            ),
            'label'      => __('Header Layout', 'fxm'),
            'description' => __('Select the Site`s header layout style.', 'fxm'),
            'section'    => 'fxm_header_settings',
            'settings'   => 'fxm_header_layout',
          )
        )
      );
    }

    /**
     *
     */
    // public function load_config_files()
    // {
    //   require FXM_THEME_DIR . 'inc/customizer/types/panel.php';
    // }

    /**
     * @todo abstract class inheritance-methods to reuse this shit
     * Register custom section and panel.
     *
     * @since 1.0.0
     */
    // public function register_panels()
    // {
      // @see 2021 theme's, Neve's and Astras' functions for ref and improvement
      // $panels = $this->panels_to_register;
      // foreach ($panels as $panel) {
      //   $this->wpc->add_panel($panel->id, $panel->args);
      // }
    // }


    // Register Sections, Controls, Settings, Defaults
    // & Types(?)

    // Selective Refresh, Sanitize, Save Options
  }
endif;

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Fxm_Customizer::get_instance();
