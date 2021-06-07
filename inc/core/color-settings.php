<?php

/**
 * @todo cleanup
 * @see wp-content/themes/astra/inc/class-astra-dynamic-css.php
 */

// $fxm_default_colors
// @todo see (S)CSS bookmarks in chrome to make mixins on these and etc
// @todo set defaults for real somewhere
// @todo options for implementation here include
// Making the color fields "non required" on admin edit menu of colors, and hook into the fields to set the default back if cleared (so no empty option is ever passed in) - mening they could be required but hooked on clear, or non required and hooked on save.
// Have the defaults set here in an array as below, with non required fields so they can be empty and set values conditionally

// $fxm_text_colors = [
//   'titles',
//   'subtitles',
//   'text',
//   'info',
//   'links',
//   'labels'
// ];
// $fxm_theme_colors = [
//   'info',
//   'success',
//   'error'
// ];

// $fxm_default_colors = [
//   $fxm_brand_colors,
//   $fxm_text_colors,
//   $fxm_theme_colors
// ]

/**
 * @todo update comment
 * Gets the selected colors in the ACF options page
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_get_theme_colors')) {
  function fxm_get_theme_colors()
  {
    // Branding Colors
    $colors = get_field('theme_branding_colors', 'option');
    // Footer Colors
    $footer_top_bg = get_field('top_footer_background_color', 'option');
    $footer_bottom_bg = get_field('bottom_footer_background_color', 'option');

    // All
    $theme_colors = [
      'main' => $colors['main_color'],
      'second' => $colors['secondary_color'],
      'third' => $colors['third_color'],
      'fourth' => $colors['fourth_color'],
      // @todo general section
      'foot_top_bg' => $footer_top_bg,
      'foot_bottom_bg' => $footer_bottom_bg,
    ];
    return $theme_colors;
  }
}

/**
 *
 */
if (!function_exists('fxm_print_css_variables')) {
  function fxm_print_css_variables($key, $color)
  {
    if (empty($color)) {
      return;
    }
    echo '--fm-' . esc_attr($key) . '-color: ' . esc_attr($color) . ';';
  }
}
