<?php /* Template Name: Contact */ ?>
<?php $options = mh_theme_options(); ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mh-wrapper clearfix">
	<div class="mh-main">
    	<div class="mh-content <?php mh_content_class(); ?>">
    		<?php mh_before_page_content(); ?>
            <div <?php post_class(); ?>>
	        	<div class="entry clearfix">
	        		<?php the_content(); ?>
	        	</div>
		    </div>
			<?php endwhile; ?>
            <?php endif; ?>
        </div>
        <?php if ($options['sidebars'] != 'no') { ?>
        <aside class="mh-sidebar <?php mh_sb_class(); ?>">
    		<?php dynamic_sidebar('contact'); ?>
		</aside>
		<?php } ?>
    </div>
    <?php if ($options['sidebars'] == 'two') { ?>
    <aside class="mh-sidebar-2 sb-right">
    	<?php dynamic_sidebar('contact-2'); ?>
    </aside>
    <?php } ?>
</div>
<?php get_footer(); ?>