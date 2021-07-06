<?php

/**
 *
 * @todo customizer settings || acf options
 * @todo styles
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
// @todo
// $cols = get_field('footer_columns', 'option');
// $cols_class = ($cols === '4') ? '3' : '4';
$cols = '4';
$cols_class = 3;
?>
<div class="site-footer__top">
  <div class="site-footer__inner">
    <div class="row">
      <div class="col-md-<?= esc_attr($cols_class); ?>">
        <?php dynamic_sidebar('footer-1'); ?>
      </div>
      <div class="col-md-<?= esc_attr($cols_class); ?>">
        <?php dynamic_sidebar('footer-2'); ?>
      </div>
      <div class="col-md-<?= esc_attr($cols_class); ?>">
        <?php dynamic_sidebar('footer-3'); ?>
      </div>
      <?php if ($cols === '4') : ?>
        <div class="col-md-3">
          <?php dynamic_sidebar('footer-4'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>