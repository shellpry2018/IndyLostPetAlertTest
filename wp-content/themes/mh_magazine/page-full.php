<?php /* Template Name: Page - Full Width */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mh-wrapper">
	<?php mh_before_page_content(); ?>
		<?php get_template_part('content', 'page'); ?>
	<?php endwhile; ?>
		<?php get_template_part('comments', 'pages'); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>