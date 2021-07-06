<?php
/**
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( fxm_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php // fxm_primary_class(); ?>>

		<?php fxm_primary_content_top(); ?>

		<?php fxm_archive_header(); ?>

		<?php fxm_content_loop(); ?>

		<?php fxm_pagination(); ?>

		<?php fxm_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( fxm_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>