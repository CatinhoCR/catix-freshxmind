<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ditso_Catix
 */

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

	fxm_content_loop();

	fxm_pagination();

	fxm_primary_content_bottom();
	?>
</div><!-- #primary -->

<?php
if (fxm_page_layout() == 'right-sidebar') :
	get_sidebar();
endif;
?>

<?php get_footer();

