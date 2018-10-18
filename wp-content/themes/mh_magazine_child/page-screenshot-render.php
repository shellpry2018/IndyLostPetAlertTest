<style>
body {
	background: white !important;
    position: absolute;
    top: 0;
    width:100%;
}
.mh-container {
	margin:auto !important;
	width:1000px !important;
	box-shadow: none !important;
    margin: auto;
}
.post-header-image.pet-image,
.pet-information {
	width: 48%;
	display: inline-block;
	vertical-align: top;
	margin: 20px 0 40px;
}
.post-header-image .size-medium.aligncenter {
	margin-top:10px;
	max-width: 100%;
	max-height: 100%;
    width: initial !important;
    height: initial !important;
}

.slicknav_menu,
.header-wrap,
.news-ticker.clearfix,
.copyright-wrap,
iframe {
	display: none;
}
</style>

<?php get_header(); ?>
<?php 
	$post_id = $_GET['report_post'];
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
?>
<?php get_footer(); ?>