<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mh-wrapper clearfix">
	<div class="mh-main">
		<div class="mh-content <?php mh_content_class(); ?>"><?php
			mh_before_post_content();
			if (is_attachment()) {
				get_template_part('content', 'attachment');
			} else {
				get_template_part('content', 'single');
			}
			mh_after_post_content();
			endwhile;
			comments_template();
			endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
    <?php mh_second_sb(); ?>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_google_api_key() ?>"></script>
<script src="/wp-content/themes/mh_magazine_child/zipcodes.js"></script>
<?php get_footer(); ?>