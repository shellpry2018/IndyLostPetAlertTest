<?php
	require_once('functions/admin-edit.php');
	require_once('functions/async-emails.php');
	require_once('functions/aviary-image-editor.php');
	require_once('functions/customize-register.php');
	require_once('functions/front-end-editor.php');
	require_once('functions/gform.php');
	require_once('functions/init.php');
	require_once('functions/mh-magazine.php');

	if(!function_exists('jetpack_googlemaps_shortcode')) {
		function jetpack_googlemaps_shortcode( $atts ) {
			if(!isset($atts[0])) return '';

			$params = ltrim($atts[0], '=');

			$width = 425;
			$height = 350;

			if(preg_match('!^https?://(www|maps|mapsengine)\.google(\.co|\.com)?(\.[a-z]+)?/.*?(\?.+)!i', $params, $match)) {
				$params = str_replace('&amp;amp;', '&amp;', $params);
				$params = str_replace('&amp;', '&', $params);
				parse_str($params, $arg);

				if(isset($arg['hq'])) unset($arg['hq']);

				$url = '';
				foreach((array) $arg as $key => $value) {
					if('w' == $key) {
						$percent = ('%' == substr($value, -1)) ? '%' : '';
						$width = (int) $value . $percent;
					} elseif('h' == $key) {
						$height = (int) $value;
					} else {
						$key = str_replace('_', '.', $key);
						$url .= esc_attr("$key=$value&amp;");
					}
				}
				$url = substr($url, 0, -5);

				if(is_ssl()) $url = str_replace( 'http://', 'https://', $url );

				$css_class = 'googlemaps';

				if (!empty( $atts['align']) && in_array(strtolower($atts['align']), array('left', 'center', 'right'), true)) {
					$atts['align'] = strtolower($atts['align']);

					if($atts['align'] === 'left') {
						$css_class .= ' alignleft';
					} elseif($atts['align'] === 'center') {
						$css_class .= ' aligncenter';
					} elseif($atts['align'] === 'right') {
						$css_class .= ' alignright';
					}
				}

				return '<div class="' . esc_attr($css_class) . '"><iframe width="' . $width . '" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $url . '"></iframe></div>';
			}
		}
		add_shortcode('googlemaps', 'jetpack_googlemaps_shortcode');
	}

	function cache_buster() {
		echo '<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />';
	}
	add_action('admin_head', 'cache_buster');
?>