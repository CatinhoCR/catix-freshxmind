<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ditso
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if (!function_exists('fxm_body_classes')) :
  function fxm_body_classes($classes)
  {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
      $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
      $classes[] = 'no-sidebar';
    }

    return $classes;
  }
  add_filter('body_class', 'fxm_body_classes');
endif;

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if (!function_exists('fxm_pingback_header')) :
  function fxm_pingback_header()
  {
    if (is_singular() && pings_open()) {
      printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
  }
  add_action('wp_head', 'fxm_pingback_header');
endif;

/**
 * Filter to Add CSS Classes to <li>'s
 * of Nav Menus
 */
if (!function_exists('fxm_add_menu_li_class')) :
  function fxm_add_menu_li_class($classes, $item, $args, $depth)
  {
    // @todo not working
    // echo var_dump($args);
    // if(isset($args->add_li_class)) {
    // if (array_key_exists('add_li_class', $args)) {
    // if (isset($args->item_class)) {
    //   $classes[] = $args['add_li_class'];
    // }
    $classes[] = 'nav__item';
    return $classes;
  }
  add_filter( 'nav_menu_css_class', 'fxm_add_menu_li_class', 10, 4 );
endif;


/**
 * Print CSS Classes
 * Block-Element-Modifier Formatted Variations
 * Based on template's conditions and params
 */
if (!function_exists('fxm_variation_classes')) :
  /**
   * Print formatted Strings to be added as CSS classes
   * @param string Base_Class to be added before variations (OPTIONAL)
   * @param array variations, strings with each new class to be added
   * @return strings CSS classes ready
   */
  function fxm_variation_classes($base_class = '', $variations = [])
  {
    if (empty($variations)) {
      return;
    }
    $classes = [];
    foreach ($variations as $value) {
      // Check if multiple word string coming from DB, make sure values on ACF make sense to CSS
      if (strpos($value, '_') !== false) {
        $vals = explode("_", $value);
        foreach ($vals as $val) {
          $classes[] = !empty($base_class) ? $base_class . '--' . $val : $val;
        }
      } else {
        $classes[] = !empty($base_class) ? $base_class . '--' . $value : $value;
      }
    }
    echo implode(' ', $classes);
    // return $classes;
  }
endif;

/**
 * Print Block's CSS Classes
 * Same as above but for blocks
 * @todo Determine if needed
 */
if (!function_exists('fxm_print_block_classes')) :
  /**
   * Print formatted Strings to be added as CSS classes
   * @param string Block_Class to be added before variations (REQUIRED)
   * @param array variations, strings with each new class to be added
   * @return strings CSS classes ready
   */
  function fxm_print_block_classes($base_class, $variations)
  {
    if (empty($base_class) || empty($variations)) {
      return;
    }
    $classes = [];
    foreach ($variations as $value) {
      // Check if multiple word string coming from DB, make sure values on ACF make sense to CSS
      if (strpos($value, '_') !== false) {
        $vals = explode("_", $value);
        foreach ($vals as $val) {
          $classes[] = !empty($base_class) ? $base_class . '__' . $val : $val;
        }
      } else {
        $classes[] = !empty($base_class) ? $base_class . '__' . $value : $value;
      }
    }
    echo implode(' ', $classes);
    // return $classes;
  }

endif;
