<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package freshXmind
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 *
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
