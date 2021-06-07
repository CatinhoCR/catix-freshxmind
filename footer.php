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
fxm_footer_before();
fxm_main_site_footer();
?>


<!-- Extra stuff like site-wide notice banners or back to top button here below -->
<?php fxm_footer_after(); ?>
<?php get_template_part('resources/blocks/back-to-top'); ?>

<?php wp_footer(); ?>
<?php fxm_body_bottom(); ?>
</body>
</html>