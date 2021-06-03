<?php

/**
 * Core Files refer to main theme's functions made to customize/extend built-in WP functions
 * For any custom made function use the methods folder instead
 *
 * @package fxm
 * @author CATO
 * @since version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$custom_includes = [

];

foreach ($custom_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
