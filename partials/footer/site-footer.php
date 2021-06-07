<?php

/**
 *
 */
// echo var_dump($args);
$show_social = get_field('show_social_networks_area', 'option');
$cols = get_field('footer_columns', 'option');
$cols_class = ($cols === '4') ? '3' : '4';
?>

<footer class="site-footer">
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
  <div class="site-footer__bottom">
    <div class="site-footer__inner">
      <div class="row">
        <div class="col">
          <p class="text text--sm text-white">
            <?php the_field('copyright_text', 'option'); ?>
          </p>
        </div>
        <div class="col">
        </div>
      </div>
    </div>
  </div>
</footer>