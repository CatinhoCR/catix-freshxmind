<?php

/**
 * Helpers and Common Methods for this theme
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$methods_includes = [
  'inc/common/helper-functions.php',
  'inc/common/markup-functions.php'
];

foreach ($methods_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
