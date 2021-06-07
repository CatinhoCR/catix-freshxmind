<?php

/**
 * Custom Logo For Main Nav
 *
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 */
?>

<?php if (has_custom_logo()) :  ?>
  <?php
  // Get Custom Logo URL
  $custom_logo_id = get_theme_mod('custom_logo');
  $custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
  $custom_logo_url = $custom_logo_data[0];
  ?>

  <a class="brand__link" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
    <img class="brand__logo full" src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
  </a>
<?php else : ?>

  <a class="brand__link site-name heading heading-md text-green" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
    <?php bloginfo('name'); ?>
  </a>
<?php endif; ?>