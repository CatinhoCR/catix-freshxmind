<?php

/**
 * Get custom logo from ACF fields
 * @deprecated
 * @todo Decide approach this or custom logo from customizer..
 * if customizer, then how to add other logo versions needs to be decided
 * @param Array $args
 * @param String $args->style (prop) (can be normal || mini)
 * @param String $args->color (prop) (can be light || dark)
 * @param String $args->version (can be both || retina || mini)
 */

$logo_style = !empty($args) ? $args : [];

// Create fallbacks if $args present but not all indexes sent
$logo_style['style'] = !empty($logo_style['style'])
  ? $logo_style['style']
  : 'normal';

$logo_style['color'] = !empty($logo_style['color'])
  ? $logo_style['color']
  : 'light';

$logo_style['version'] = !empty($logo_style['version'])
  ? $logo_style['version']
  : 'retina';

$logo_style['link_class'] = !empty($logo_style['link_class'])
  ? $logo_style['link_class']
  : 'brand__link';

$logo_style['img_class'] = !empty($logo_style['img_class'])
  ? $logo_style['img_class']
  : 'brand__logo';

// Get right color/size versions of logos based on $logo_style keys
$brand_logos = ($logo_style['color'] === 'dark')
  ? get_field('dark_version_logos', 'option')
  : get_field('light_version_logos', 'option');

// If 'mini' version is NOT selected get Retina Logo Versions (so retina||both)
if ($logo_style['version'] !== 'mini') {
  $retina_logo = $brand_logos['retina_logo'];
  $regular_logo = $brand_logos['regular_logo'];
}
// If 'retina' version is NOT selected get Mini Logo Versions (so mini||both)
if ($logo_style['version'] !== 'retina') {
  $mini_logo = $brand_logos['mini_logo'];
}
?>
<a
  href="<?= esc_url(home_url('/')) ?>"
  title="<?= get_bloginfo('name') ?>"
  class="<?= esc_attr($logo_style['link_class']) ?>"
>
  <?php if ($logo_style['version'] !== 'mini') : ?>
    <img
      class="brand__logo full"
      src="<?= esc_url($retina_logo['url']) ?>"
      alt="<?= get_bloginfo('name') ?>"
    >
  <?php endif; ?>
  <?php if ($logo_style['version'] !== 'retina') : ?>
    <img
      class="brand__logo mini"
      src="<?= esc_url($mini_logo['url']) ?>"
      alt="<?= get_bloginfo('name') ?>"
      loading="lazy"
    >
  <?php endif; ?>
</a>