<?php

/**
 * A custom Navigation Walker Function to customize the output of the Wordpress built in Menus using wp_nav_menu($args) function
 * Used in partials/header/header-navbar.php
 * Customize or delete as needed
 *
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * @see https://developer.wordpress.org/reference/classes/walker/
 * @package freshxmind
 * @author Cato
 * @since 1.0.0
 *
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

/**
 * Custom Nav Menu Walker
 *
 * @access      public
 * @since       1.0
 * @return      void
 * @package freshxmind
 */
class FreshXMind_Custom_Megamenu extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    $description = $item->description;
    $permalink = $item->url;
    $classes         = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'header__item-nav';
    $item->classes = $classes;
    //

    $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

    //Add SPAN if no Permalink
    if ($permalink && $permalink != '#') {
      $output .= '<a class="header__link-nav" href="' . $permalink . '">';
    } else {
      $output .= '<span>';
    }

    $output .= $title;

    if ($description != '' && $depth == 0) {
      $output .= '<small class="description">' . $description . '</small>';
    }

    if ($permalink && $permalink != '#') {
      $output .= '</a>';
    } else {
      $output .= '</span>';
    }
  }
}