<?php

/**
 * Use this as reference for adding Custom Taxonomies
 * This example adds a tax to book-authors
 * Search & Replace "Collection" with your custom tax name
 * Replace "product" with the post type the tax will be added to
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @see https://developer.wordpress.org/plugins/taxonomies/working-with-custom-taxonomies/
 * @see register_post_type() for registering custom post types.
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 *
 * Register Custom Woocommerce Product Taxonomy
 */

// if (class_exists('WooCommerce')) {}
if (!function_exists('fxm_custom_taxonomy_item')) {
  function fxm_custom_taxonomy_item()
  {

    $labels = array(
      'name'                       => _x('Collections', 'fxm'),
      'singular_name'              => _x('Collection', 'fxm'),
      'menu_name'                  => __('Collections', 'fxm'),
      'all_items'                  => __('All Collections', 'fxm'),
      'parent_item'                => __('Parent Collection', 'fxm'),
      'parent_item_colon'          => __('Parent Collection:', 'fxm'),
      'new_item_name'              => __('New Collection Name', 'fxm'),
      'add_new_item'               => __('Add New Collection', 'fxm'),
      'edit_item'                  => __('Edit Collection', 'fxm'),
      'update_item'                => __('Update Collection', 'fxm'),
      'separate_items_with_commas' => __('Separate Collection with commas', 'fxm'),
      'search_items'               => __('Search Collections', 'fxm'),
      'add_or_remove_items'        => __('Add or remove Collections', 'fxm'),
      'choose_from_most_used'      => __('Choose from the most used Collections', 'fxm'),
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_in_rest'               => true,
      'query_var'                  => true,
      'rewrite'                    => array('slug' => _x('collection', 'fxm')),
    );
    register_taxonomy('collection', 'books', $args);
  }
  add_action('init', 'fxm_custom_taxonomy_item', 0);
}
