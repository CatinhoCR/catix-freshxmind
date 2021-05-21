<?php

/**
 * @todo RENAME AND FIGURE A BETTER WAY TO INCLUDE THIS GENERIC
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if (!function_exists('fxm_widgets_init')) {
	function fxm_widgets_init()
	{
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Main', 'freshxmind'),
				'id'            => 'sidebar-1',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Secondary', 'freshxmind'),
				'id'            => 'sidebar-2',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Tertiary', 'freshxmind'),
				'id'            => 'sidebar-3',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Sidebar Shop', 'freshxmind'),
				'id'            => 'sidebar-shop',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 1', 'freshxmind'),
				'id'            => 'footer-1',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 2', 'freshxmind'),
				'id'            => 'footer-2',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 3', 'freshxmind'),
				'id'            => 'footer-3',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__('Footer 4', 'freshxmind'),
				'id'            => 'footer-4',
				'description'   => esc_html__('Add widgets here.', 'freshxmind'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget__title heading heading--xs">',
				'after_title'   => '</h2>',
			)
		);
	}
	add_action('widgets_init', 'fxm_widgets_init');
}
