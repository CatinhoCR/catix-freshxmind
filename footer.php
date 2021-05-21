<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package freshXmind
 */

/**
 * fxm_after_main_content hook
 *
 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
 */
fxm_content_after();

do_action('fxm_footer_content');
?>
<?php // get_template_part('resources/blocks/subscribe', 'subfooter'); ?>
<?php // get_template_part('resources/blocks/footer'); ?>

<!-- Extra stuff like site-wide notice banners or back to top button here below -->
<?php get_template_part('resources/blocks/back-to-top'); ?>

<?php wp_footer(); ?>

</body>
</html>