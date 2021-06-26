<?php
/**
*
* Custom Methods
*
*/
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$methods_includes = [
  'inc/methods/sidebar-manager.php',
];

foreach ($methods_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'Ditso'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
