<?php
/**
*
* Plugins Compatibility
*
*/
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$plugin_includes = [
  'inc/compat/acf-options-page.php',
  // 'inc/compat/_.php',
];

foreach ($plugin_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'Ditso'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
