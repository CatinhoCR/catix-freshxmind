<?php

/**
 * Theme Hook Alliance hook stub list.
 * @see 'inc/template-parts' folders for the add_action functions
 *
 * @see 'inc/template-parts/[...]' for the functions registering the actions
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     FreshXMind
 * @author      Cato
 * @since       1.0.0
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Themes and Plugins can check for fxm_hooks using current_theme_supports( 'fxm_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'fxm_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'fxm_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support(
  'fxm_hooks',
  array(

    /**
     * As a Theme developer, use the 'all' parameter, to declare support for all
     * hook types.
     * Please make sure you then actually reference all the hooks in this file,
     * Plugin developers depend on it!
     */
    'all',

    /**
     * Themes can also choose to only support certain hook types.
     * Please make sure you then actually reference all the hooks in this type
     * family.
     *
     * When the 'all' parameter was set, specific hook types do not need to be
     * added explicitly.
     */
    'html',
    'body',
    'head',
    'header',
    'content',
    'entry',
    'comments',
    'sidebars',
    'sidebar',
    'footer',

    /**
   * @internal
   * If/when WordPress Core implements similar methodology, Themes and Plugins
   * will be able to check whether the version of THA supplied by the theme
   * supports Core hooks.
   */
  )
);

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 * 		if ( current_theme_supports( 'fxm_hooks', 'header' ) )
 * 	  		add_action( 'fxm_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool $bool true
 * @param array $args The hook type being checked
 * @param array $registered All registered hook types
 *
 * @return bool
 */
function fxm_current_theme_supports($bool, $args, $registered)
{
  return in_array($args[0], $registered[0]) || in_array('all', $registered[0]);
}
add_filter('current_theme_supports-fxm_hooks', 'fxm_current_theme_supports', 10, 3);

/**
 * @see https://github.com/zamoose/themehookalliance/blob/master/fxm-theme-hooks.php
 *
 * Hooks should be of the form fxm_ + [section of the theme] + _[placement within block].
 */

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $fxm_supports[] = 'html;
 * @todo
 */
function fxm_html_before()
{
  do_action('fxm_html_before');
}

/**
 * HTML <body> hooks
 * $fxm_supports[] = 'body';
 * @see wrappers.php
 */
function fxm_body_top()
{
  do_action('fxm_body_top');
}

/**
 * Body Bottom
 */
function fxm_body_bottom()
{
  do_action('fxm_body_bottom');
}

/**
 * HTML <head> hooks
 *
 * $fxm_supports[] = 'head';
 */
function fxm_head_top()
{
  do_action('fxm_head_top');
}

/**
 * Head Bottom
 */
function fxm_head_bottom()
{
  do_action('fxm_head_bottom');
}

/**
 * Semantic <header> hooks
 *
 * $fxm_supports[] = 'header';
 * @see header.php in root folder
 * @see inc/template-parts/header.php
 */
function fxm_header_before()
{
  do_action('fxm_header_before');
}

/**
 * Main Site Header
 * Outputs top & bottom header hooks
 * <header></header>
 */
function fxm_site_header() {
  do_action('fxm_site_header');
}

/**
 * Top Header Content inside <header>
 */
function fxm_header_top()
{
  do_action('fxm_header_top');
}

/**
 * Bottom Header Content inside <header>
 */
function fxm_header_bottom()
{
  do_action('fxm_header_bottom');
}

/**
 * After Header
 *
 * Use for adding content after closing </header>
 * And before the <main> Wrappers
 */
function fxm_header_after()
{
  do_action('fxm_header_after');
}

/**
 * Semantic <content> hooks
 *
 * $fxm_supports[] = 'content';
 * @see inc/template-parts/content-actions.php
 */
function fxm_content_before()
{
  do_action('fxm_content_before');
}

function fxm_content_after()
{
  do_action('fxm_content_after');
}

function fxm_content_top()
{
  do_action('fxm_content_top');
}

function fxm_content_bottom()
{
  do_action('fxm_content_bottom');
}

function fxm_content_while_before()
{
  do_action('fxm_content_while_before');
}

function fxm_content_while_after()
{
  do_action('fxm_content_while_after');
}

/**
 * Semantic <entry> hooks
 *
 * $fxm_supports[] = 'entry';
 */
function fxm_entry_before()
{
  do_action('fxm_entry_before');
}

function fxm_entry_after()
{
  do_action('fxm_entry_after');
}

function fxm_entry_content_before()
{
  do_action('fxm_entry_content_before');
}

function fxm_entry_content_after()
{
  do_action('fxm_entry_content_after');
}

function fxm_entry_top()
{
  do_action('fxm_entry_top');
}

function fxm_entry_bottom()
{
  do_action('fxm_entry_bottom');
}

/**
 * Comments block hooks
 *
 * $fxm_supports[] = 'comments';
 */
function fxm_comments_before()
{
  do_action('fxm_comments_before');
}

function fxm_comments_after()
{
  do_action('fxm_comments_after');
}

/**
 * Semantic <sidebar> hooks
 *
 * $fxm_supports[] = 'sidebar';
 */
function fxm_sidebars_before()
{
  do_action('fxm_sidebars_before');
}

function fxm_sidebars_after()
{
  do_action('fxm_sidebars_after');
}

function fxm_sidebar_top()
{
  do_action('fxm_sidebar_top');
}

function fxm_sidebar_bottom()
{
  do_action('fxm_sidebar_bottom');
}

/**
 * Semantic <footer> hooks
 *
 * $fxm_supports[] = 'footer';
 */
function fxm_footer_before()
{
  do_action('fxm_footer_before');
}

function fxm_footer_after()
{
  do_action('fxm_footer_after');
}

function fxm_footer_top()
{
  do_action('fxm_footer_top');
}

function fxm_footer_bottom()
{
  do_action('fxm_footer_bottom');
}

// @todo
function fxm_print_theme_colors()
{
  do_action('fxm_print_theme_colors');
}
