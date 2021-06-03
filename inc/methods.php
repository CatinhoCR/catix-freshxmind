<?php
/**
*
* Custom Methods
*
*/

$methods_includes = [
  // 'inc/methods/get_listing_articles.php',
  // 'inc/methods/template-tags.php',
  // 'inc/methods/template-functions.php',
  // 'inc/methods/get_related_posts.php',
  // 'inc/methods/load-more-posts.php',
  // 'inc/methods/get-filtered-products.php',
  // 'inc/methods/search-filters.php'
];

foreach ($methods_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'freshxmind'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
