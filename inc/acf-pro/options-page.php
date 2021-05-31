<?php

/**
 * ACF Options Pages
 */

if (function_exists('acf_add_options_page')) {

  // acf_add_options_page(array(
  //   'page_title'    => __('Theme Enabled Features'),
  //   'menu_title'    => __('Theme Features'),
  //   'menu_slug'     => 'fxm-theme-features',
  //   'capability'    => 'update_plugins',
  //   'icon_url'      => 'dashicons-admin-network',
  //   'redirect'      => true
  // ));

  acf_add_options_page(array(
    'page_title'     => __('Layout Settings - Fresh Catix Mind'),
    'menu_title'    => __('Layout Settings'),
    'menu_slug'     => 'freshxmind-layout-settings',
    'capability'    => 'edit_posts',
    'icon_url'      => 'dashicons-slides',
    'redirect'        => false
  ));
  acf_add_options_sub_page(array(
    'page_title'     => __('Header Layout Settings'),
    'menu_title'    => __('Header'),
    'parent_slug'    => 'freshxmind-layout-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => __('Footer Layout Settings'),
    'menu_title'    => __('Footer'),
    'parent_slug'    => 'freshxmind-layout-settings',
  ));

  // old @todo @deprecated
  acf_add_options_page(array(
    'page_title'     => 'Theme Settings',
    'menu_title'    => 'Theme Settings',
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'        => true
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Global Settings',
    'menu_title'    => 'Global Settings',
    'parent_slug'    => 'theme-general-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Page Settings',
    'menu_title'    => 'Page Settings',
    'parent_slug'    => 'theme-general-settings',
  ));
  acf_add_options_sub_page(array(
    'page_title'     => 'Brand Settings',
    'menu_title'    => 'Brand Settings',
    'parent_slug'    => 'theme-general-settings',
  ));
}
