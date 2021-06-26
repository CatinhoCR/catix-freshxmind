<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ditso_Catix
 */

/**
 * fxm_after_main_content hook
 *
 * @hooked themename_wrapper_end - 10 (outputs closing divs for the content)
 */
fxm_content_after(); ?>

<?php fxm_footer_before(); ?>
<?php fxm_main_site_footer(); ?>
<?php fxm_footer_after(); ?>
<!-- Extra stuff like site-wide notice banners or back to top button here below -->
<?php fxm_body_bottom(); ?>
<?php wp_footer(); ?>
</body>

</html>