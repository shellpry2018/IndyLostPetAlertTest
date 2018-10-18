<?php 
	if(!is_user_logged_in()) : 
		wp_redirect('/');
	else : ?>
<?php get_header(); ?>

<style>
.result-title,
.result-value {
	display: inline-block;
}
.result-title {
	width: 200px;
}
ul li {
	margin: 10px 0;
}
</style>

<div class="mh-wrapper clearfix">

    <div class="mh-main">
        <div class="mh-content <?php mh_content_class(); ?>">
            <?php mh_before_page_content(); ?>
      
            <?php include(locate_template('page-reporting/page-content.php')) ?>
        </div>
		<?php get_sidebar(); ?>
    </div>
    <?php mh_second_sb(); ?>
</div>
<?php get_footer(); ?>

<?php endif ?>