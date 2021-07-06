<?php
/**
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Page Title
 */
if ( ! function_exists( 'fxm_archive_page_header' ) ) :

	/**
	 * Wrapper function for the_title()
	 *
	 * Displays title only if the page title bar is disabled.
	 */
	function fxm_archive_page_header() {

    if ( is_search() ) {
      $desc = '';
      $title = apply_filters( 'fxm_the_search_page_title', sprintf( __( 'Search Results for: %s', 'fxm' ), '<span>' . get_search_query() . '</span>' ) );
    } elseif ( is_category() ) {
      # code...
    } elseif ( is_tag() ) {
      # code...
    } elseif ( is_author() ) {
      # code...
    } else {

    }
    $args = [
      'title'   => !empty($title) ? $title : '',
      'desc'    => !empty($desc) ? $desc : ''
    ];
    get_template_part('partials/blocks/page', 'header', $args);
	}

	add_action( 'fxm_archive_header', 'fxm_archive_page_header' );
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
    $base_class = esc_html($base_class);
    foreach ($variations as $value) {

      $value = esc_html($value);
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
