<?php

/**
 * @todo RENAME AND FIGURE A BETTER WAY TO INCLUDE THIS GENERIC
 * Custom Post Type for book-authors
 */
function freshxmind_custom_book_authors()
{
  // Set UI labels for Custom Post Type
  $labels = array(
    'name'                => _x('Book Authors', 'Post Type General Name', 'freshxmind'),
    'singular_name'       => _x('Book Author', 'Post Type Singular Name', 'freshxmind'),
    'menu_name'           => __('Book Authors', 'freshxmind'),
    // 'parent_item_colon'   => __('Parent Book Author', 'freshxmind'),
    'all_items'           => __('All Book Authors', 'freshxmind'),
    'view_item'           => __('View Book Author', 'freshxmind'),
    'add_new_item'        => __('Add New Book Author', 'freshxmind'),
    'add_new'             => __('Add Author', 'freshxmind'),
    'edit_item'           => __('Edit Book Author', 'freshxmind'),
    'update_item'         => __('Update Book Author', 'freshxmind'),
    'search_items'        => __('Search Book Author', 'freshxmind'),
    'not_found'           => __('Not Found', 'freshxmind'),
    'not_found_in_trash'  => __('Not found in Trash', 'freshxmind'),
  );

  // Set other options for Custom Post Type
  $args = array(
    'label'               => __('book-authors', 'freshxmind'),
    'description'         => __('Book Author news and reviews', 'freshxmind'),
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
    'rewrite'            => array('slug' => _x('autores', 'slug', 'freshxmind')),
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
add_action('init', 'freshxmind_custom_book_authors', 0);

/**
 * To get permalinks to work when you activate the theme
 * @ Hook: after_switch_theme
 */
function freshxmind_authors_rewrite_flush()
{
  freshxmind_custom_book_authors();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'freshxmind_authors_rewrite_flush');
