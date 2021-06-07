<?php

/**
 * The template for displaying 404 pages (not found)
 * Template Name: 404 Page
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if (fxm_page_layout() == 'left-sidebar') : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php // fxm_primary_class(); ?>>

  <?php // fxm_primary_content_top(); ?>

  <?php // fxm_404_content_template(); ?>

  <?php // fxm_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if (fxm_page_layout() == 'right-sidebar') : ?>

  <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>


<!-- <div class="page-not-found" id="page-not-found">
  <div class="page-not-found__inner">
    <p class="page-not-found__eyebrow">404</p>
    <h1 class="page-not-found__headline">Oops! Something’s not right.</h1>
    <p class="page-not-found__copy">Go back to the home page to continue your Fal.Con 2020 experience.</p>
    <div class="page-not-found__cta">
      <a class="button button--lg" href="/">Back to Homepage <?php // get_template_part('images/icons/arrow-right');
                                                              ?></a>
    </div>
  </div>
</div> -->