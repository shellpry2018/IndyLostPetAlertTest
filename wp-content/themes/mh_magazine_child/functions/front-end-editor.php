<?php 
	function my_enqueue_media_lib_uploader() {
	    wp_enqueue_media();
	    wp_enqueue_script('media-lib-uploader-js');
	}
	add_action('wp_enqueue_scripts', 'my_enqueue_media_lib_uploader');

	function enqueue_datepicker() {
	    wp_enqueue_script('jquery-ui-datepicker');
	}
	add_action('wp_enqueue_scripts', 'enqueue_datepicker');

	function ilpa_alert_screenshot($atts, $content = null) {
		if(!is_user_logged_in()) {
			return false;
		}

		extract(shortcode_atts([
			'snap' => 'http://s.wordpress.com/mshots/v1/',
			'url' => 'https://whatswp.com',
			'alt' => 'screenshot',
			'w' => '1000',
			'h' => '700',
		], $atts));

		$img = '<img alt="' . $alt . '" src="' . $snap . urlencode($url) . '?w=' . $w . '&h=' . $h . '" />';
		$download_link = '<a href="' . $snap . urlencode($url) . '?w=' . $w . '&h=' . $h . '" download>Download Screenshot</a>';
		// $download_link .= $img;

		return $download_link;
	}
	add_shortcode('screenshot', 'ilpa_alert_screenshot');
?>