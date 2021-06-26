<?php

/**
 *
 * Helpers Functions
 *
 */
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Custom logs to wp-content/debug.log
 */
if (!function_exists('write_log')) {
  function write_log($log)
  {
    if (true === WP_DEBUG) {
      if (is_array($log) || is_object($log)) {
        error_log(print_r($log, true));
      } else {
        error_log($log);
      }
    }
  }
}

/**
 * Display Bytes in Readable Format (GB, MB...)
 */
function formatSizeUnits($bytes)
{
  if ($bytes >= 1073741824) {
    $bytes = number_format($bytes / 1073741824, 2) . 'gb';
  } elseif ($bytes >= 1048576) {
    $bytes = number_format($bytes / 1048576, 2) . 'mb';
  } elseif ($bytes >= 1024) {
    $bytes = round(number_format($bytes / 1024, 2)) . 'kb';
  } elseif ($bytes > 1) {
    $bytes = $bytes . ' bytes';
  } elseif ($bytes == 1) {
    $bytes = $bytes . ' byte';
  } else {
    $bytes = '0 bytes';
  }
  return $bytes;
}

/**
 * Get Current Protocol (Https or Http)
 */
function get_protocol()
{
  if (is_ssl()) {
    return 'https';
  } else {
    return 'http';
  }
}

/**
 * @param array $actual The array to be defaulted
 * @param array $defaults The default values for the array
 *
 * @return array The array with default values applied
 */
function apply_defaults($actual, $defaults)
{
  foreach ($defaults as $key => $value) {
    if (empty($actual[$key])) {
      $actual[$key] = $value;
    }
  }
  return $actual;
}

/**
 * Throws a 404 error when needed.
 */
function throw404($code = 404)
{
  global $wp_query;
  $wp_query->set_404();

  status_header($code);
  nocache_headers();

  require get_404_template();
  exit;
}
