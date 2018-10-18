<!DOCTYPE html>
<html class="no-js<?php mh_html_class(); ?>" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<title><?php wp_title('|', true, 'right'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" id="child-css" href="<?php echo home_url() ?>/wp-content/themes/mh_magazine_child/child.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" media="print" href="<?php echo home_url() ?>/wp-content/themes/mh_magazine_child/print.css" />
</head>
<body <?php body_class() ?>>
<script>
jQuery(function($){
	$('img').each(function(){
		var imgsrc = $(this).attr('src');
		console.log(imgsrc);
		imgsrc += (imgsrc.indexOf('?') > -1 ? '&' : '?');
		imgsrc += 'randomstring=' + Math.random() * 99999999;
		console.log(imgsrc);
		$(this).attr('src', imgsrc);
	});
});
</script>
<?php if (is_active_sidebar('header')) { ?>
<aside class="header-widget">
	<?php dynamic_sidebar('header'); ?>
</aside>
<?php } ?>
<div class="mh-container">
<?php mh_before_header(); ?>
<header class="header-wrap">
	<?php if (has_nav_menu('header_nav')) { ?>
	<nav class="header-nav clearfix">
		<?php wp_nav_menu(array('theme_location' => 'header_nav', 'fallback_cb' => '')); ?>
	</nav>
	<?php } ?>
	<?php mh_logo(); ?>
	<nav class="main-nav clearfix">
		<?php wp_nav_menu(array('theme_location' => 'main_nav')); ?>
	</nav>
	<?php if (has_nav_menu('info_nav')) { ?>
	<nav class="info-nav clearfix">
		<?php wp_nav_menu(array('theme_location' => 'info_nav', 'fallback_cb' => '')); ?>
	</nav>
	<?php } ?>
</header>
<?php mh_after_header(); ?>