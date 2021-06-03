<?php
/**
 * Hook into wp_head for awesomeness
 * This is a TODO: and will become relevant for production hooks into the wp_head tags
 * Examples of things that may be added here:
 * GA tag, SEO tags, Social Media tags
 *
 * @link https://www.intelliwolf.com/clean-up-wordpress-head-code/
 * @link https://crunchify.com/how-to-clean-up-wordpress-header-section-without-any-plugin/
 */


/**
 * Add Google Analytics Support and Snippet to Head
 */
function fxm_add_gtag_to_head() {

}

/**
 * Add a custom CSS with the user selected colors for the theme features
 */


 /**
 * Wordpress meta tags version generators
 */
function crunchify_remove_version() {
	return '';
}
// add_filter('the_generator', 'crunchify_remove_version');

/**
 * REST API
 */
// remove_action('wp_head', 'rest_output_link_wp_head', 10);
// remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
// remove_action('template_redirect', 'rest_output_link_header', 11, 0);


/**
 * WP default EditURI to your site header
 * required if you are publishing post by third party tool
 */
// remove_action ('wp_head', 'rsd_link');
// remove_action( 'wp_head', 'wlwmanifest_link');
// remove_action( 'wp_head', 'wp_shortlink_wp_head');

/**
 * Style and Scripts version query string for static 3rd party assets
 */
// function crunchify_cleanup_query_string( $src ){
// 	$parts = explode( '?', $src );
// 	return $parts[0];
// }
// add_filter( 'script_loader_src', 'crunchify_cleanup_query_string', 15, 1 );
// add_filter( 'style_loader_src', 'crunchify_cleanup_query_string', 15, 1 );

/**
 * Disable the emoji's
 *
*/
function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');


/**
 * Filter function used to remove the tinymce emoji plugin.*
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}
/**
 * Remove emoji CDN hostname from DNS prefetching hints. *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference between the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
  if ('dns-prefetch' == $relation_type) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2.3/svg/');
    $urls = array_diff($urls, array($emoji_svg_url));
  }
  return $urls;
}
