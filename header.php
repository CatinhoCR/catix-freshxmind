<?php

/**
 * The template for displaying the header
 *
 * Displays all of the <head> element and everything up until the page header div
 * and the content wrapper start
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditso_Catix
 */


if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php fxm_html_before(); ?>
<html <?php language_attributes(); ?>>

<head>
  <?php fxm_head_top(); ?>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <?php fxm_head_bottom(); ?>
</head>

<body <?php body_class(); ?>>
  <?php fxm_body_top(); ?>

  <?php wp_body_open(); ?>

  <?php fxm_header_before(); ?>

  <?php
  /**
   * Theme Action Hook
   * @see 'partials/blocks/header.php'
   */
  fxm_site_header();
  ?>

  <?php fxm_header_after(); ?>

  <?php
  /**
   * @see 'inc/core'template-parts.php'
   */
  fxm_content_before();
  ?>