<?php

/**
 * Use this as reference for adding Custom Post Types
 * Search & Replace "Book" with your CPT's name
 * Ideally this would be added from a plugin, but depending on your project
 * Added as a sample reference. Edit or delete as needed.
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 *
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!function_exists('fxm_register_cpt_books')) {
  function fxm_register_cpt_books()
  {
    // Set UI labels for Custom Post Type
    $labels = array(
      'name'                => _x('Books', 'Post Type General Name', 'fxm'),
      'singular_name'       => _x('Book', 'Post Type Singular Name', 'fxm'),
      'menu_name'           => __('Books', 'fxm'),
      // 'parent_item_colon'   => __('Parent Book', 'fxm'),
      'all_items'           => __('All Books', 'fxm'),
      'view_item'           => __('View Book', 'fxm'),
      'add_new_item'        => __('Add New Book', 'fxm'),
      'add_new'             => __('Add Book', 'fxm'),
      'edit_item'           => __('Edit Book', 'fxm'),
      'update_item'         => __('Update Book', 'fxm'),
      'search_items'        => __('Search Book', 'fxm'),
      'not_found'           => __('Not Found', 'fxm'),
      'not_found_in_trash'  => __('Not found in Trash', 'fxm'),
    );

    // Set other options for Custom Post Type
    $args = array(
      'description'         => __('Book news and reviews', 'fxm'),
      'labels'              => $labels,
      'menu_icon'           => 'dashicons-edit',
      /**
       * Supports @see https://developer.wordpress.org/reference/functions/register_post_type/#supports
       * Other options not included here are:
       * 'author', 'excerpt', 'trackbacks', 'comments', 'post-formats'
       */
      'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
      'hierarchical'        => false,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 5,
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'query_var'          => true,
      'rewrite'            => array('slug' => _x('books', 'fxm')),
      'publicly_queryable'  => true,
      'capability_type'     => 'post',
      'show_in_rest' => true,
    );

    // Registering Custom Post Type
    register_post_type('books', $args);
  }

  /**
   * Hook into the 'init' action so that the function
   * Containing our post type registration is not
   * unnecessarily executed.
   */
  add_action('init', 'fxm_register_cpt_books', 0);
}

/**
 * To get permalinks to work when you activate the theme
 * @ Hook: after_switch_theme
 */
if (!function_exists('fxm_books_rewrite_flush')) {
  function fxm_books_rewrite_flush()
  {
    fxm_register_cpt_books();
    flush_rewrite_rules();
  }
  add_action('after_switch_theme', 'fxm_books_rewrite_flush');
}
