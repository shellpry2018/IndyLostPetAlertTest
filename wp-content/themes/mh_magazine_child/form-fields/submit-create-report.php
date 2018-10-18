<?php
	require_once("../../../../wp-load.php");

	$report_title = ucwords(str_replace('-', ' ', $_POST['report_type']));
	$report_title .= ' Report - ' . $_POST['first_name'] . ' ' . $_POST['last_name'];
	if(isset($_POST['pet_name'])) $report_title .= ' (' . $_POST['pet_name'] . ')';

	$report_id = wp_insert_post([
	    'post_type' => 'report',
	    'post_title' => $report_title,
	    'post_status' => 'publish',
	]);

	$post_categories = [];
	$upload_dir = wp_upload_dir();
	$tmp_uploads_folder = $upload_dir['basedir'] . '/tmp/' . $_POST['tmp_uploads_folder'];
	foreach($_POST as $key => $value) {
		$key_term_array = explode('__', $key);
		$is_category = ($key_term_array[0] == 'post_categories');
		if($is_category && $value) {
			$post_categories[] = $value;
		} elseif($key == 'pet_image' && $value) {
			$original_filename = trim($_POST['pet_image']);
			$original_filename = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $original_filename);
			if(file_exists($original_filename)) {
				$filename = str_replace($tmp_uploads_folder, $upload_dir['path'], $original_filename);
				if(file_exists($filename)) {
					$current_time = date('Ymd-Gis', time());
					$file_basename = basename($filename);

					$filename_array = explode('.', $file_basename);
					$file_extension = strtolower($filename_array[count($filename_array) - 1]);
		        	unset($filename_array[count($filename_array) - 1]);
					$file_basename_without_extension = implode('.', $filename_array);

		        	$new_file_basename = $file_basename_without_extension . '-' . $current_time . '.' . $file_extension;
		        	$filename = str_replace($file_basename, $new_file_basename, $filename);
				}

				rename($original_filename, $filename);
				$filetype = wp_check_filetype(basename($original_filename), null);
				$attachment = [
					'guid'           => $wp_upload_dir['url'] . '/' . basename($filename), 
					'post_mime_type' => $filetype['type'],
					'post_title'     => preg_replace( '/\.[^.]+$/', '', basename($filename)),
					'post_content'   => '',
					'post_status'    => 'inherit'
				];
				$attach_id = wp_insert_attachment($attachment, $filename);
				require_once(ABSPATH . 'wp-admin/includes/image.php');

				$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
				wp_update_attachment_metadata($attach_id, $attach_data);
				update_post_meta($report_id, $key, $attach_id);
				rmdir($tmp_uploads_folder);
			}
		} elseif($key == 'phone' || $key == 'alternate_phone') {
			update_post_meta($report_id, $key, preg_replace("/[^0-9,.]/", "", $value));
		} elseif($key != 'confirm_email' && $key != 'tmp_uploads_folder') {
			update_post_meta($report_id, $key, $value);
		}
	}

	//When processed, delete temp folder
	update_post_meta($report_id, 'post_categories', serialize($post_categories));

	wp_redirect('/wp-content/themes/mh_magazine_child/form-fields/submit-create-post.php?report_id=' . $report_id . '&redirect_link=' . $_POST['redirect_link']);
?>
