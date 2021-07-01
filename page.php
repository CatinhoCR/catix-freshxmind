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

// fxm_content_top();
// fxm_content_bottom();
// fxm_content_while_before();
// fxm_content_while_after();
?>
<?php get_header(); ?>

	<!-- <main id="primary" class="site-main"> -->

		<?php
		// @todo fxm_main_loop_content();
		// while ( have_posts() ) :
		// 	the_post();
    //   the_content();

			// get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		// endwhile; // End of the loop.
		?>

	<!-- </main> -->


<?php // get_sidebar(); ?>
<?php get_footer(); ?>
