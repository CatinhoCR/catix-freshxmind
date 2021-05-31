<?php
/**
 * The template for displaying 404 pages (not found)
 * Template Name: 404
 */
// $red_wave = array(
//     'shape' => 'one',
//     'before_color' => '#f00000',
//     'wave_color' => '#f00000',
//     'after_color' => 'transparent',
//     'transform' =>    'flip-vertical',
// );
// $bg_video = get_field('404_background_video', 'option');

get_header(); ?>

<div class="page-not-found<?= empty($bg_video) ? ' page-not-found--has-background-img' : '' ?>" id="page-not-found">
  <div class="page-not-found__inner">
    <p class="page-not-found__eyebrow">404</p>
    <h1 class="page-not-found__headline">Oops! Something’s not right.</h1>
    <p class="page-not-found__copy">Go back to the home page to continue your Fal.Con 2020 experience.</p>
    <div class="page-not-found__cta">
      <a class="button button--lg" href="/">Back to Homepage <?php // get_template_part('images/icons/arrow-right'); ?></a>
    </div>
  </div>
  <?php // set_query_var('wave_style', $red_wave); ?>
  <div class="page-not-found__bottom-curve">
      <?php // get_template_part('resources/components/colored-wave'); ?>
  </div>
  <?php  if(!empty($bg_video) && !empty($bg_video['url'])): ?>
  <div class="page-not-found__video">
    <video playsinline muted autoplay>
      <source src="<?= $bg_video['url'] ?>" type="<?php // $bg_video['mime_type'] ?>" />
    </video>
  </div>
  <?php endif; ?>
</div>

<?php
// $footer_style = 'error';
get_footer();
?>
