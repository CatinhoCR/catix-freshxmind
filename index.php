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
 * @package FreshXMind
 * @since 1.0.0
 * @todo:
 * @see /Users/andrescastillo/Sites/fxm/index.php
 * @see wp-content/themes/astra/index.php
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<?php get_header(); ?>

<?php fxm_content_top(); ?>

<?php
if (fxm_page_layout() == 'left-sidebar') :
	get_sidebar();
endif;
?>
<div>
	<h1>Content top and bottom in this div, or as wrappers?</h1>
</div>
<!-- fxm_content_while_before(); -->
<!-- fxm_content_while_after(); -->


<?php
if (fxm_page_layout() == 'right-sidebar') :
	get_sidebar();
endif;
?>
<?php fxm_content_bottom(); ?>
<?php get_footer();