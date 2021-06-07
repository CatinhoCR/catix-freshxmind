<?php

/**
 * @todo RENAME AND FIGURE A BETTER WAY TO INCLUDE THIS GENERIC
 * Register widget area.
 * @package FreshXMind
 * @author Cato
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @todo @see wp-content/themes/astra/inc/widgets.php
 */
if (!function_exists('fxm_widgets_init')) {
	function fxm_widgets_init()
	{
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Main', 'fxm'),
				'id'            => 'sidebar-1',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Secondary', 'fxm'),
				'id'            => 'sidebar-2',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Tertiary', 'fxm'),
				'id'            => 'sidebar-3',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Shop', 'fxm'),
				'id'            => 'sidebar-shop',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 1', 'fxm'),
				'id'            => 'footer-1',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 2', 'fxm'),
				'id'            => 'footer-2',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 3', 'fxm'),
				'id'            => 'footer-3',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 4', 'fxm'),
				'id'            => 'footer-4',
				'description'   => esc_html__('Add widgets here.', 'fxm'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action('widgets_init', 'fxm_widgets_init');
}
