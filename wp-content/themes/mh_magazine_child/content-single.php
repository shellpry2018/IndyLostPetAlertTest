<article <?php post_class(); ?>>
	<header class="post-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php mh_post_header(); ?>
	</header>
	<?php dynamic_sidebar('posts-1'); ?>
	<div class="entry clearfix">
		<?php mh_post_content_top(); ?>
		<?php 
			if(is_user_logged_in()) {
				echo '<h2>Admins Only</h2>';	
				echo do_shortcode('[screenshot url="' . home_url() . '/screenshot-render/?report_post=' . get_the_id() . '"]'); 
			}
		?>
		<?php mh_post_content(); ?>
		<?php mh_post_content_bottom(); ?>
	</div>
	<?php if (has_tag()) : ?>
		<div class="post-tags clearfix">
        	<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
        </div>
	<?php endif; ?>
	<?php dynamic_sidebar('posts-2'); ?>
</article>