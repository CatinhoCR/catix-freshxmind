<?php

/**
 * Define common WP plugins' and libs compatibility
 *
 * @package fxm
 * @author CATO
 * @since version 1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$compat_includes[] = 'inc/compatibility/plugin-support.php';

// ACF Plugin Functions & Support
// @todo Either make markup non ACF dependant OR make a mu-plugin to check if active
// And If not, then include/activate it and/or print a user warning it must be activated
if (is_acf_activated()) {
  $acf_dir = 'inc/compatibility/acf/';
  $acf_inc = [
    $acf_dir . 'acf-options-page.php'
  ];
  array_push($compat_includes, ...$acf_inc);
}


// WooCommerce Plugin Functions & Support
if (is_woocommerce_activated()) {
  $wc_dir = 'inc/compatibility/woocommerce/';
  $wc_inc = [
    $wc_dir . 'class-fxm-woocommerce.php'
  ];
  array_push($compat_includes, ...$wc_inc);
}

foreach ($compat_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fxm'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
