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
