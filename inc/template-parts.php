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

$template_parts_includes = [
  'inc/template-parts/content.php',
  'inc/template-parts/header.php',
  'inc/template-parts/footer.php',
  // 'inc/template-parts/.php',
];

foreach ($template_parts_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'fxm'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
