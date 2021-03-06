<?php

/**
 * ACF Options Pages
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'     => __('Theme Options - Fresh Catix Mind', 'fxm'),
    'menu_title'    => __('Theme Options', 'fxm'),
    'menu_slug'     => 'freshxmind-theme-options',
    'capability'    => 'edit_posts',
    'icon_url'      => 'dashicons-excerpt-view',
    'redirect'        => true
  ));
  // Branding Options
  acf_add_options_sub_page(array(
    'page_title'     => __('Branding Specific Settings', 'fxm'),
    'menu_title'    => __('Branding', 'fxm'),
    // 'parent_slug'    => 'freshxmind-content-settings',
    'parent_slug'   => 'freshxmind-theme-options',
  ));

  // Pages Content Options
  acf_add_options_sub_page(array(
    'page_title'     => __('Pages Content Distribution Settings', 'fxm'),
    'menu_title'    => __('Content Settings', 'fxm'),
    // 'parent_slug'    => 'freshxmind-layout-settings',
    'parent_slug'   => 'freshxmind-theme-options',
  ));

  // General Site Layout Options
  acf_add_options_sub_page(array(
    'page_title'     => __('Layout General Site Settings', 'fxm'),
    'menu_title'    => __('General Layout', 'fxm'),
    // 'parent_slug'    => 'freshxmind-layout-settings',
    'parent_slug'   => 'freshxmind-theme-options',
  ));

  // acf_add_options_page(array(
  //   'page_title'    => __('Theme Enabled Features'),
  //   'menu_title'    => __('Theme Features'),
  //   'menu_slug'     => 'fxm-theme-features',
  //   'capability'    => 'update_plugins',
  //   'icon_url'      => 'dashicons-admin-network',
  //   'redirect'      => true
  // ));
  // @todo add Content Settings Page with subpages for things like posts per page, etc.

  // acf_add_options_page(array(
  //   'page_title'     => __('Content Settings - Fresh Catix Mind', 'fxm'),
  //   'menu_title'    => __('Content Settings', 'fxm'),
  //   'menu_slug'     => 'freshxmind-content-settings',
  //   'capability'    => 'edit_posts',
  //   'icon_url'      => 'dashicons-excerpt-view',
  //   'redirect'        => true
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Brand Content Settings', 'fxm'),
  //   'menu_title'    => __('Brand Content', 'fxm'),
  //   'parent_slug'    => 'freshxmind-content-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Global Content Settings', 'fxm'),
  //   'menu_title'    => __('Global Settings', 'fxm'),
  //   'parent_slug'    => 'freshxmind-content-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Blog Pages Content Settings', 'fxm'),
  //   'menu_title'    => __('Blog Settings', 'fxm'),
  //   'parent_slug'    => 'freshxmind-content-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Shop Pages Content Settings', 'fxm'),
  //   'menu_title'    => __('Shop Settings', 'fxm'),
  //   'parent_slug'    => 'freshxmind-content-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Search Results Page Content Settings', 'fxm'),
  //   'menu_title'    => __('Search Results', 'fxm'),
  //   'parent_slug'    => 'freshxmind-content-settings',
  // ));

  // acf_add_options_page(array(
  //   'page_title'     => __('Layout Settings - Fresh Catix Mind', 'fxm'),
  //   'menu_title'    => __('Layout Settings', 'fxm'),
  //   'menu_slug'     => 'freshxmind-layout-settings',
  //   'capability'    => 'edit_posts',
  //   'icon_url'      => 'dashicons-slides',
  //   'redirect'        => true
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Branding Layout Settings', 'fxm'),
  //   'menu_title'    => __('Colors & Branding', 'fxm'),
  //   'parent_slug'    => 'freshxmind-layout-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Header Layout Settings', 'fxm'),
  //   'menu_title'    => __('Header', 'fxm'),
  //   'parent_slug'    => 'freshxmind-layout-settings',
  // ));
  // acf_add_options_sub_page(array(
  //   'page_title'     => __('Footer Layout Settings', 'fxm'),
  //   'menu_title'    => __('Footer', 'fxm'),
  //   'parent_slug'    => 'freshxmind-layout-settings',
  // ));
}
