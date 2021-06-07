<?php
/**
 * Sidebar Manager functions
 *
 * @package     FreshXMind
 * @author      FreshXMind
 * @copyright   Copyright (c) 2020, FreshXMind
 * @link        https://wpfxm.com/
 * @since       FreshXMind 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Site Sidebar
 */
if ( ! function_exists( 'fxm_page_layout' ) ) {

	/**
	 * Site Sidebar
	 *
	 * Default 'right sidebar' for overall site.
	 */
	function fxm_page_layout($layout = '') {

    if ( is_singular() ) {
      // If post meta value is empty,
			// Then get the POST_TYPE's sidebar
      // $layout = get post meta
			// $layout = fxm_get_option_meta( 'site-sidebar-layout', '', true );
      $post_type = get_post_type();

      if ( 'post' === $post_type || 'page' === $post_type || 'product' === $post_type ) {
        // $layout = fxm_get_option( 'single-' . get_post_type() . '-sidebar-layout' );
      }

      if ( 'default' == $layout || empty( $layout ) ) {

        // Get the global sidebar value.
        // NOTE: Here not used `true` in the below function call.
        // $layout = fxm_get_option( 'site-sidebar-layout' );
      }
    } else {
      if ( is_search() ) {

      } else {

      }
    }
    return apply_filters( 'fxm_page_layout', $layout );
  }
}