<?php

/**
 * Template part for displaying single post details page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package catix-mindful-joy-gulp
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post detail single'); ?>>
	<div class="post-header">
		<div class="container max-width-1300">
			<div class="row">
				<div class="col-lg-6 post-content-cover">
					<?php // echo freshxmind_post_thumbnail(); ?>
				</div>
				<div class="col-lg-6">
					<?php // fxm_single_category(); ?>
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					<?php
					// freshxmind_posted_by();
					?>
					<i class="fas fa-tags"></i>
					<?php
					$tags = the_tags();
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="post-content">
		<div class="container max-width-720">
			<div class="row">
				<div class="col-12">
					<?php
					// freshxmind_posted_on();
					?>
					<div>
						<?php
						// the_content();
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'catix'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="post-footer">
		<!-- share, comments, etc -->
	</div>
</article>