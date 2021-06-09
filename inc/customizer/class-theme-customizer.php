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
      // @todo Add Sidebar Section with following settings/controls:
      // @todo Default Layout (None|Left|Right)
      // @todo Pages, Blog Page, Blog Posts, Archives, Shop Pages SELECT dropdown to override
      // @todo Sidebar width
      // @todo Add Footer Section
      // @todo Add Header Section
      // @todo Add Fonts Section

      // Define a new panel/section (if desired) to the Theme Customizer
      add_action('customize_register', array($this, 'add_custom_sections_panels'));

      // Register new settings to the WP database
      add_action('customize_register', array($this, 'add_custom_color_settings'));
      add_action('customize_register', array($this, 'add_custom_sidebar_settings'));

      // Define the controls (which links a setting to a section and renders the HTML controls)
      add_action('customize_register', array($this, 'add_custom_color_controls'));
      add_action('customize_register', array($this, 'add_custom_sidebar_controls'));

      // Output custom CSS to live site
      // add_action('wp_head', array($this, 'header_output'));

      // Enqueue live preview javascript in Theme Customizer admin screen
      // add_action('customize_preview_init', array($this, 'live_preview'));

      // add_action( 'customize_register', array( $this, 'customize_default_sections' ), 2 );
      // add_action('customize_register', array($this, 'customize_register_panel'));
    }

    /**
     * Register custom section and panel.
     *
     * @since 1.0.0
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function add_custom_sections_panels($wp_customize)
    {
      // Add Theme Options Panel
      $wp_customize->add_panel(
        'fxm_theme_options_panel',
        array(
          'title' => __('Theme Options', 'fxm'),
          'description' => __('', 'fxm'), //Descriptive tooltip
          'priority' => 10,
        )
      );

      // Add Colors Section
      $wp_customize->add_section(
        'fxm_color_options',
        array(
          'title'       => __('Color Settings', 'fxm'), //Visible title of section
          'priority'    => 10, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );

      // Add Sidebar Settings Section
      $wp_customize->add_section(
        'fxm_sidebar_settings',
        array(
          'title'       => __('Sidebar Settings', 'fxm'), //Visible title of section
          'priority'    => 20, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );

      // Add Blog Settings Section
      $wp_customize->add_section(
        'fxm_blog_settings',
        array(
          'title'       => __('Blog Settings', 'fxm'), //Visible title of section
          'priority'    => 20, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('Here you can edit settings related to the Blog Page and Posts.', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );

      // Add WC - Shop Settings Section
      $wp_customize->add_section(
        'fxm_shop_settings',
        array(
          'title'       => __('Shop Settings', 'fxm'), //Visible title of section
          'priority'    => 20, //Determines what order this appears in
          'capability'  => 'edit_theme_options', //Capability needed to tweak
          'description' => __('Here you can edit settings related to the Shop Pages and Products.', 'fxm'), //Descriptive tooltip
          'panel' => 'fxm_theme_options_panel',
        )
      );
    }

    /**
     * Register Color Settings
     * @todo Add Text Color, Link Color, Link Hover Color, Headings Color, Background Color
     *
     */
    public function add_custom_color_settings($wp_customize)
    {
      $wp_customize->add_setting(
        'fxm_primary_color',
        array(
          'default' => '#9e3226',
          'sanitize_callback' => 'sanitize_hex_color',
          // 'transport' => 'postMessage' | 'refresh',
        )
      );
      $wp_customize->add_setting(
        'fxm_secondary_color',
        array(
          'default' => '#070a17',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      $wp_customize->add_setting(
        'fxm_link_color',
        array(
          'default' => '#054880',
          'sanitize_callback' => 'sanitize_hex_color',
        )
      );
      // #074f67
    }

    /**
     * Register Sidebar Settings
     * @todo Add Blog, Single Post, Shop, Product, Pages, Archives Options to override the default
     *
     */
    public function add_custom_sidebar_settings($wp_customize)
    {
      $wp_customize->add_setting(
        'fxm_sidebar_default',
        array(
          'default' => 'default-sidebar',
          'sanitize_callback' => '',
          // 'transport' => 'postMessage' | 'refresh',
        )
      );
    }

    /**
     *
     */
    public function add_custom_sidebar_controls($wp_customize)
    {
      $wp_customize->add_control(
        new WP_Customize_Control(
          $wp_customize,
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
     *
     */
    public function add_custom_color_controls($wp_customize)
    {
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'link_color',
          array(
            'label'      => __('Links Color', 'fxm'),
            'description' => __('Color used for links inside text', 'fxm'),
            'section'    => 'fxm_color_options',
            'settings'   => 'fxm_link_color',
          )
        )
      );
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          'fxm_primary_color',
          array(
            'label' => __('Main Layout Color', 'fxm'),
            'description' => __('Main color used for buttons and other layout options', 'fxm'),
            'section' => 'fxm_color_options',
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
            'section' => 'fxm_color_options',
            'settings' => 'fxm_secondary_color',
          )
        )
      );
    }

    /**
     * This will output the custom WordPress settings to the live theme's WP head.
     *
     * Used by hook: 'wp_head'
     * @todo make these CSS variables so SCSS can grab them
     * @see add_action('wp_head',$func)
     * @since MyTheme 1.0
     */
    public static function header_output()
    {
?>
      <!--Customizer CSS-->
      <style type="text/css">
        <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?><?php self::generate_css('body', 'background-color', 'background_color', '#'); ?><?php self::generate_css('a', 'color', 'link_textcolor'); ?>
      </style>
      <!--/Customizer CSS-->
<?php
    }

    /**
     * This outputs the javascript needed to automate the live settings preview.
     * Also keep in mind that this function isn't necessary unless your settings
     * are using 'transport'=>'postMessage' instead of the default 'transport'
     * => 'refresh'
     *
     * Used by hook: 'customize_preview_init'
     * @todo This is not done nor functional yet
     * @see add_action('customize_preview_init',$func)
     * @since MyTheme 1.0
     */
    public static function live_preview()
    {
      wp_enqueue_script(
        'mytheme-themecustomizer', // Give the script a unique ID
        get_template_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
        array('jquery', 'customize-preview'), // Define dependencies
        '', // Define a version (optional)
        true // Specify whether to put in footer (leave this true)
      );
    }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     *
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since 1.0.0
     */
    public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
    {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if (!empty($mod)) {
        $return = sprintf(
          '%s { %s:%s; }',
          $selector,
          $style,
          $prefix . $mod . $postfix
        );
        if ($echo) {
          echo $return;
        }
      }
      return $return;
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
