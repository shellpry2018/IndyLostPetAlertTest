<?php
	function theme_js() {
		wp_enqueue_script('site', get_stylesheet_directory_uri() . '/assets/js/main.js', ['jquery'], '', true);
		wp_enqueue_script('jquery-form', get_stylesheet_directory_uri() . '/assets/js/jquery.form.min.js', ['jquery'], '', true);
		wp_enqueue_script('upload-progress', get_stylesheet_directory_uri() . '/assets/js/upload-progress.js', ['jquery', 'jquery-form'], '', true);
	}
	add_action('wp_enqueue_scripts', 'theme_js');

	function child_css() {
		wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
		wp_enqueue_style('child_css', get_stylesheet_directory_uri() . '/child.css');
	}	
	add_action('admin_enqueue_scripts', 'child_css');

	function add_categories_for_attachments() {
	    register_taxonomy_for_object_type('category', 'attachment');
	    add_editor_style( 'post_formatting.css');
	} 
	add_action('init' , 'add_categories_for_attachments');	

	function update_my_custom_type() {
		global $wp_post_types;
	 
		if (post_type_exists('report')) {
			$wp_post_types['report']->exclude_from_search = true;
		}
	}
	add_action('init', 'update_my_custom_type', 99);

	function get_google_api_key() {
		return 'AIzaSyCsda7YQmFkhuhyoIsqv6klKSTLXXkZJBs';
	}

	function display_result($item) {
		echo '<pre>';
		print_r($item);
		echo '</pre>';
	}

	function get_timestamp_minus_one_year() {
		$date_format = 'Y-m-d H:i:s'; 
		$current_year = date('Y');
		$current_month = date('m');
		$last_year = $current_year - 1;
		return date($date_format, strtotime($current_month . '/01/' . $last_year));
	}

	function get_update_type_options() {
		return [
			'still_missing' => 'Pet is still missing - please post alert again (yes, I have been checking shelters and have signs posted in my area).',
			'my_pet_home' => 'Our pet is back home!',
			'found_pet_home' => 'The pet we found is back home!',
			'pet_escaped' => 'The pet we found escaped from our care.',
			'taken_to_shelter' => 'The pet we found was taken to a shelter',
			'pet_deceased' => 'Pet was found deceased.',
			'additional_pictures' => 'Additional picture of pet.',
	    ];
	}
?>