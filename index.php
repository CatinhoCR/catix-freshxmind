<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ditso_Catix
 * @since 1.0.0
 * @todo:
 * @see /Users/andrescastillo/Sites/fxm/index.php
 * @see wp-content/themes/fxm/index.php
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

<div id="primary" <?php // fxm_primary_class(); ?>>
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
