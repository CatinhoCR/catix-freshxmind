<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ditso_Catix
 * @author Cato
 * @since 1.0.0
 */

 if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>
<?php get_header(); ?>


<?php
if (fxm_page_layout() == 'left-sidebar') :
	get_sidebar();
endif;
?>

<div id="primary" <?php fxm_primary_class(); ?>>
	<?php
	fxm_primary_content_top();

	fxm_content_page_loop();

	fxm_primary_content_bottom();
	?>
</div><!-- #primary -->


<?php
if (fxm_page_layout() == 'right-sidebar') :
	get_sidebar();
endif;
?>
<?php get_footer();
