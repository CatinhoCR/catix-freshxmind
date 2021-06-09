<?php

/**
 * All conditional tags used throughout the theme
 * Wrapper functions to validate the exitence or activation
 * of WP plugins and/or Hooks, etc.
 *
 * @package FreshXMind
 * @author Cato
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Check if WooCommerce is activated
 */
if (!function_exists('is_woocommerce_activated')) {
  function is_woocommerce_activated()
  {
    if (class_exists('woocommerce')) {
      return true;
    } else {
      return false;
    }
  }
}

/**
 * Check if Advanced Custom Fields is activated
 */
if (!function_exists('is_acf_activated')) {
  function is_acf_activated()
  {
    return (class_exists('acf')) ? true : false;
    // if (class_exists('acf')) {
    //   return true;
    // } else {
    //   return false;
    // }
  }
}
