<?php

/**
 * These files register the actions hooked in core/theme-hooks.php
 * do_actions and functions to get template parts
 * fetched/processed data should be sent in to the template via $args parameter
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 *
 * @see https://developer.wordpress.org/reference/functions/get_template_part/
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// 'inc/template-parts/.php',
$template_parts_includes = [
  //
  'inc/template-parts/markup-extras.php',
  //
  'inc/template-parts/wrapper-actions.php',
  'inc/template-parts/footer-actions.php',
  'inc/template-parts/blocks.php',
  // Loop Class
  'inc/template-parts/class-content-loop.php',
  // @todo Site Header
  'inc/template-parts/class-header-content.php',
  // 'inc/template-parts/header-actions.php',
];

foreach ($template_parts_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fxm'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
