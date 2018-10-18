<?php
	function mh_post_meta() {
	    $options = mh_theme_options();
	    $post_date = !$options['post_meta_date'];
	    $post_author = !$options['post_meta_author'];
	    $post_cat = !$options['post_meta_cat'];
	    $post_comments = !$options['post_meta_comments'];
	    if ($post_date || $post_author || $post_cat || $post_comments) {
	        echo '<p class="meta post-meta">';
	            if ($post_date || $post_author || $post_cat) {
	                $post_date ? $date = sprintf(_x('on %s', 'post date', 'mh'), '<span class="updated">' . get_the_date() . '</span> ') : $date = '';
	                $post_author ? $byline = '' : $byline = '';
	                $post_cat ? $category = sprintf(_x('in %s', 'post category', 'mh'), get_the_category_list(', ', '')) : $category = '';
	                printf(_x('Posted %1$s %2$s %3$s', 'post meta', 'mh'), $date, $byline, $category);
	                if ($post_comments) {
	                    echo ' // ';
	                }
	            }
	            if ($post_comments) {
	                mh_comment_count();
	            }
	        echo '</p>' . "\n";
	    }
	}
	add_action('mh_post_header', 'mh_post_meta');

	function mh_themes_setup() {
		$header = array(
			'default-image'	=> get_template_directory_uri() . '/images/logo.png',
			'default-text-color' => '000',
			'width' => 300,
			'height' => 100,
			'flex-width' => true,
			'flex-height' => true
		);
		add_theme_support('custom-header', $header);

		load_theme_textdomain('mh', get_template_directory() . '/languages');

		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background');
		add_theme_support('post-thumbnails');

		add_editor_style();

		register_nav_menus(array(
			'header_nav' => __('Header Navigation', 'mh'),
			'main_nav' => __('Main Navigation', 'mh'),
			'info_nav' => __('Additional Navigation (below Main Navigation)', 'mh'),
			'footer_nav' => __('Footer Navigation', 'mh')
		));

		add_filter('use_default_gallery_style', '__return_false');
	}	

	function mh_head_misc() {
	    $options = mh_theme_options();
	    if ($options['mh_favicon']) {
	        echo '<link rel="shortcut icon" href="' . esc_url($options['mh_favicon']) . '">' . "\n";
	    }
	    echo '<!--[if lt IE 9]>' . "\n";
	    echo '<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>' . "\n";
	    echo '<![endif]-->' . "\n";
	    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
	    echo '<link rel="pingback" href="' . get_bloginfo('pingback_url') . '"/>' . "\n";
	}
	
?>