<?php
/**
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper function to get the current post id.
 */
if ( ! function_exists( 'fxm_get_post_id' ) ) {

	/**
	 * Get post ID.
	 *
	 * @param  string $post_id_override Get override post ID.
	 * @return number                   Post ID.
	 */
	function fxm_get_post_id( $post_id_override = '' ) {

		if ( null == Astra_Theme_Options::$post_id ) {
			global $post;

			$post_id = 0;

			if ( is_home() ) {
				$post_id = get_option( 'page_for_posts' );
			} elseif ( is_archive() ) {
				global $wp_query;
				$post_id = $wp_query->get_queried_object_id();
			} elseif ( isset( $post->ID ) && ! is_search() && ! is_category() ) {
				$post_id = $post->ID;
			}

			Astra_Theme_Options::$post_id = $post_id;
		}

		return apply_filters( 'fxm_get_post_id', Astra_Theme_Options::$post_id, $post_id_override );
	}
}

/**
 * Get post format
 */
if ( ! function_exists( 'fxm_get_post_format' ) ) {

	/**
	 * Get post format
	 *
	 * @param  string $post_format_override Override post formate.
	 * @return string                       Return post format.
	 */
	function fxm_get_post_format( $post_format_override = '' ) {

		if ( ( is_home() ) || is_archive() ) {
			$post_format = 'blog';
		} else {
			$post_format = get_post_format();
		}

		return apply_filters( 'fxm_get_post_format', $post_format, $post_format_override );
	}
}

/**
 * Display classes for primary div
 */
if ( ! function_exists( 'fxm_primary_class' ) ) {

	/**
	 * Display classes for primary div
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return void        Echo classes.
	 */
	function fxm_primary_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		echo 'class="' . esc_attr( join( ' ', fxm_get_primary_class( $class ) ) ) . '"';
	}
}

/**
 * Retrieve the classes for the primary element as an array.
 */
if ( ! function_exists( 'fxm_get_primary_class' ) ) {

	/**
	 * Retrieve the classes for the primary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array        Return array of classes.
	 */
	function fxm_get_primary_class( $class = '' ) {

		// array of class names.
		$classes = array();

		// default class for content area.
		$classes[] = 'content-area';

		// primary base class.
		$classes[] = 'primary';

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		// Filter primary div class names.
		$classes = apply_filters( 'fxm_primary_class', $classes, $class );

		$classes = array_map( 'sanitize_html_class', $classes );

		return array_unique( $classes );
	}
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
