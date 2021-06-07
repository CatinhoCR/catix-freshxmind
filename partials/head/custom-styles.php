<?php

/**
 * Support for custom colors, fonts, etc
 */

if (!defined('ABSPATH') || empty($args)) {
	exit; // Exit if accessed directly.
}
$colors_site = $args;
?>
<style type="text/css" media="screen">
	:root {
		<?php
		foreach ($colors_site as $key => $color) {
			fxm_print_css_variables($key, $color);
		}
		?>
	}
</style>