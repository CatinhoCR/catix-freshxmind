<?php

/**
 *
 */

/**
 * Add Google Analytics Support and Snippet to Head
 *
 * @return void
 * @since  1.0
 * @author CATO
 */
if (!function_exists('fxm_head_gtag_support')) {
	function fxm_head_gtag_support()
	{
		if (!get_field('add_google_analytics_tag', 'option')) {
			return;
		}
		$gtag_id = get_field('google_analytics_tag_id', 'option');
		get_template_part('partials/head/google', 'tag', $gtag_id);
	}
	add_action('fxm_head_bottom', 'fxm_head_gtag_support', 10);
}

/**
 *
 */
if (!function_exists('fxm_head_css_vars_support')) {
  function fxm_head_css_vars_support()
  {
    $colors_site = fxm_get_theme_colors();
		get_template_part('partials/head/custom', 'styles', $colors_site);
  }
  add_action('fxm_head_bottom', 'fxm_head_css_vars_support', 15);
}

/**
 * Custom Logo
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_custom_logo')) {
  function fxm_custom_logo()
  {
    get_template_part('partials/header/custom', 'logo');
    // get_template_part('partials/header/main', 'nav');
  }
  // add_action('fxm_header_bottom', 'fxm_header_bottom_content', 10);
}
