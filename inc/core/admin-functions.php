<?php

/**
 *
 */

// @todo Activate WordPress Maintenance Mode
if (!function_exists('fxm_maintenance_mode()')) :
  function fxm_maintenance_mode()
  {
    if (!current_user_can('edit_themes') || !is_user_logged_in()) {
      // wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
    }
  }
  add_action('get_header', 'fxm_maintenance_mode');
endif;
