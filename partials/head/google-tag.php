<?php
/**
 * Google Tag Snippet to Head Tag
 */
if (!defined('ABSPATH') || empty($args)) {
	exit; // Exit if accessed directly.
}
$gtag_id = $args;
?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_html($gtag_id); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', '<?php echo esc_html($gtag_id); ?>');
</script>