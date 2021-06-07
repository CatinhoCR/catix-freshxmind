<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 * @see https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Main Site Header Wrapper Function
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_main_site_footer')) {
	function fxm_main_site_footer()
	{
		$settings = [];
		// $show_social = get_field('show_social_networks_area', 'option');
		// $cols = get_field('footer_columns', 'option');
		// $cols_class = ($cols === '4') ? '3' : '4';
		// $show_toolbar = (get_field('show_top_toolbar', 'option')) ? true : false;
		// $settings = [
		// 	'cols' => $cols,
		// 	'cols_class' => $cols_class,
		// 	'show_social' => $show_social,
		// 	// 'toolbar' => $show_toolbar
		// ];
		get_template_part('partials/footer/site', 'footer', $settings);
	}
}

/**
 * Subscribe Section Footer
 *
 */
// if (!function_exists('fxm_before_footer')) {
//   add_action('fxm_before_footer_content', 'fxm_before_footer');
//   function fxm_before_footer() {
//     get_template_part('template-parts/components/footer/subscribe', 'subfooter');
//   }
// }

/**
 * Main Footer
 *
 */
// if (!function_exists('fxm_footer_type_display')) {
//   add_action('fxm_footer_content', 'fxm_footer_type_display');
//   function fxm_footer_type_display() {
//     $layout = get_field('footer_layout_type', 'option');
//     if ($layout === 'simple' ) {
//       get_template_part('template-parts/components/footer/simple', 'footer');
//     } else {
//       get_template_part('template-parts/components/footer/advanced', 'footer');
//     }
//     //
//   }
// }

/**
 * Legal Footer
 *
 */
// if (!function_exists('fxm_after_footer')) {
//   add_action('fxm_after_footer_content', 'fxm_after_footer');
//   function fxm_after_footer() {
//     get_template_part('template-parts/components/footer/legal', 'info');
//   }
// }
