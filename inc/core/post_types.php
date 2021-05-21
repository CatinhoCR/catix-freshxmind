<?php

/**
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 * @todo RENAME AND FIGURE A BETTER WAY TO INCLUDE THIS GENERIC
 * Custom Post Type for book-authors
 */
function fxm_custom_book_authors()
{
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Book Authors', 'Post Type General Name', 'fxm'),
    'singular_name'       => _x('Book Author', 'Post Type Singular Name', 'fxm'),
    'menu_name'           => __('Book Authors', 'fxm'),
    // 'parent_item_colon'   => __('Parent Book Author', 'fxm'),
    'all_items'           => __('All Book Authors', 'fxm'),
    'view_item'           => __('View Book Author', 'fxm'),
    'add_new_item'        => __('Add New Book Author', 'fxm'),
    'add_new'             => __('Add Author', 'fxm'),
    'edit_item'           => __('Edit Book Author', 'fxm'),
    'update_item'         => __('Update Book Author', 'fxm'),
    'search_items'        => __('Search Book Author', 'fxm'),
    'not_found'           => __('Not Found', 'fxm'),
    'not_found_in_trash'  => __('Not found in Trash', 'fxm'),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __('book-authors', 'fxm'),
    'description'         => __('Book Author news and reviews', 'fxm'),
    'labels'              => $labels,
    'menu_icon' => 'dashicons-edit',
    // Features this CPT supports in Post Editor
    'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
    /* A hierarchical CPT is like Pages and can have
  * Parent and child items. A non-hierarchical CPT
  * is like Posts.
  */
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'query_var'          => true,
    'rewrite'            => array('slug' => _x('autores', 'slug', 'fxm')),
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
    'show_in_rest' => true,
    // "show_in_rest" => false,
    "map_meta_cap" => true,
  );

  // Registering Custom Post Type
  register_post_type('book-authors', $args);
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
add_action('init', 'fxm_custom_book_authors', 0);

/**
 * To get permalinks to work when you activate the theme
 * @ Hook: after_switch_theme
 */
function fxm_authors_rewrite_flush()
{
  fxm_custom_book_authors();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'fxm_authors_rewrite_flush');
