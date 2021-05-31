<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freshXmind
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <?php // @todo gtag support, css classes, header actions ?>
</head>

<body class="page <?= implode(' ', get_body_class()) ?>">
  <?php wp_body_open(); ?>
  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'fxm'); ?></a>

  <?php fxm_header_before(); ?>

  <?php fxm_main_site_header(); ?>

  <?php fxm_header_after(); ?>
  <!-- <header class="site-header" id="siteHeader"> -->
    <?php
    // @todo
    // if (get_field('show_top_bar', 'option')) :
    //   get_template_part('resources/blocks/site-banners/notice', 'banners', ['position' => 'top']);
    // endif;
    ?>
    <?php // get_template_part('/resources/blocks/custom', 'nav'); ?>
  <!-- </header> -->

  <?php
  /**
   * fxm_before_main_content hook
   *
   * @hooked themename_wrapper_start - 10 (outputs opening divs for the content)
   */
  fxm_content_before();
  ?>