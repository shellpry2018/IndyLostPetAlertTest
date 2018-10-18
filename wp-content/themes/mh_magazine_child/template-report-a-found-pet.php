<?php
/**
 * Template Name: Found Pet Report Page
 */
?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="mh-wrapper clearfix">
    <?php
        if($_GET['ReportConfirmed'] != 'true')
            include(locate_template('verify-correct-found-form.php'))
    ?>
    <div class="mh-main">
        <div class="mh-content <?php mh_content_class(); ?>">
        	<?php include(locate_template('reporting-forms/found-pet/variables.php')) ?>
        	<?php $fields = $variable_names ?>
            <?php mh_before_page_content(); ?>
				<?php get_template_part('content', 'page'); ?>
            	<?php include(locate_template('form-fields/form-add-new-post.php')) ?>
			<?php endwhile; endif; ?>
        </div>
		<?php get_sidebar(); ?>
    </div>
    <?php mh_second_sb(); ?>
</div>
<?php get_footer(); ?>