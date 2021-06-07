<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FreshXMind
 */
// $cat_arg = array(
// 	'taxonomy' => 'category',
// 	'class' => 'form-control',
// 	// 'value_field' => 'term_id',
// 	// 'selected' => $taxonomy_id,
// 	'orderby' => 'name',
// 	'show_count' => 0,
// 	'hierarchical' => false,
// 	'hide_if_empty' => true,
// 	'walker'  => new FreshXMind_Custom_CategoryDropdown()
// );
// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 	return;
// }
?>

<aside id="secondary" class="widget-area">
	<!-- <form action="<?php // echo esc_url(home_url('/')); ?>" method="get" class="fxm-form">
		<?php // wp_dropdown_categories($cat_arg); ?>
	</form> -->
	<?php dynamic_sidebar(); ?>
</aside><!-- #secondary -->