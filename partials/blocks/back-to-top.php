<?php

/**
 * Back to top button
 * Gets included in the footer.php
 * @todo color variables, main or sec color
 * @todo cleanup JS and SCSS
 * @todo Translatable string values below
 */
$show_btn = get_field('show_back_to_top_button', 'option');
echo $show_btn;
if (!$show_btn) {
  return;
} else {
  echo "Hello";
}
?>
<button class="button button--circle button--md back-top hidden" id="backTop" title="Scroll back to top">
  <span class="hidden">Back to top</span>
  <i class="fas fa-arrow-up button__icon back-top__icon"></i>
</button>