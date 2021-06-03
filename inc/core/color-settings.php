<?php

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
 * Gets the selected colors in the ACF options page
 *
 * @return void
 * @since  1.0
 * @author CATO
 **/
if (!function_exists('fxm_get_theme_colors')) {
  function fxm_get_theme_colors()
  {
    $colors = get_field('theme_branding_colors', 'option');
    $brand_colors = [
      'main' => $colors['main_color'],
      'second' => $colors['secondary_color'],
      'third' => $colors['third_color'],
      'fourth' => $colors['fourth_color']
    ];
    return $brand_colors;
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

/**
 *
 */
if (!function_exists('fxm_theme_color_vars')) {
  function fxm_theme_color_vars()
  {
    $colors_site = fxm_get_theme_colors();
?>
    <style type="text/css" media="screen">
      :root {
        <?php
        foreach ($colors_site as $key => $color) {
          fxm_print_css_variables($key, $color);
        }
        ?>
      }
    </style>
  <?php
  }
  add_action('fxm_print_theme_colors', 'fxm_theme_color_vars');
}
