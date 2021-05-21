<?php
/**
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 * @todo RENAME AND FIGURE A BETTER WAY TO INCLUDE THIS GENERIC
 * Register Custom Woocommerce Product Taxonomy
 */

if (class_exists('WooCommerce')) {
  function fxm_custom_taxonomy_item()
  {

    $labels = array(
      'name'                       => 'Collections',
      'singular_name'              => 'Collection',
      'menu_name'                  => 'Collections',
      'all_items'                  => 'All Collections',
      'parent_item'                => 'Parent Collection',
      'parent_item_colon'          => 'Parent Collection:',
      'new_item_name'              => 'New Collection Name',
      'add_new_item'               => 'Add New Collection',
      'edit_item'                  => 'Edit Collection',
      'update_item'                => 'Update Collection',
      'separate_items_with_commas' => 'Separate Collection with commas',
      'search_items'               => 'Search Collections',
      'add_or_remove_items'        => 'Add or remove Collections',
      'choose_from_most_used'      => 'Choose from the most used Collections',
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
    );
    register_taxonomy('item', 'product', $args);
  }
  add_action('init', 'fxm_custom_taxonomy_item', 0);
}
