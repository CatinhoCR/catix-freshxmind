<?php

/**
 *
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<section class="page-header">
  <?php
  the_archive_title('<h1 class="page-title">', '</h1>');
  the_archive_description('<div class="archive-description">', '</div>');
  ?>
</section>