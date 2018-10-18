<?php
	require_once("../../../../wp-load.php");

	$post_id = $_GET['report_id'];
	$redirect_link = $_GET['redirect_link'];
	
	$report_type = get_field('report_type', $post_id);
	include(locate_template('reporting-forms/' . $report_type . '/variables.php'));

	//Clear $post_id after getting the meta values
	$report_id = $post_id;
	unset($post_id);

	$post_categories[] = get_cat_ID($variable_names['report_type']['category']);
	$category_names = [];
	foreach($post_categories as $category_id) {
		$category_object = get_category($category_id);
		$category_names[] = $category_object->name;
	}

	if($report_type != 'update-previous') {
		$post_title = strtoupper(str_replace('-', ' ', $category_names[0])) . ' ALERT! ';
		$post_title = str_replace('DOGS', 'DOG', $post_title);
		$post_title = str_replace('CATS', 'CAT', $post_title);
		$post_title = str_replace('OTHER PETS', 'OTHER PET', $post_title);
		if(isset($pet_name)) $post_title .= $pet_name . ', ';
		$post_title .= $nearest_city;		
	} else {
		$post_title = '\UPDATE ALERT!';
		if($pet_name) $post_title .= ' ' . $pet_name;
	}


	include(locate_template('reporting-forms/' . $report_type . '/post-content.php'));

	$post_id = wp_insert_post([
	    'post_title' => $post_title,
	    'post_content' => ($post_content) ? $post_content : ' ',
	    'post_status' => 'draft',
	    'post_author' => 28, //User: 'changetoyourname'
	    'post_category' => $post_categories,
	]);

	set_post_thumbnail($post_id, $pet_image);

	update_field('report_id', $report_id, $post_id);

	send_admin_email($report_id);
	send_user_email($report_id);

	wp_redirect($redirect_link);
?>
