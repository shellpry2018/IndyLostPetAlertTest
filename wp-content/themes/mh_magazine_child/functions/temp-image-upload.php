<?php
	if(count($_FILES)) {
		require_once("../../../../wp-load.php");

		$upload_dir = wp_upload_dir();
		$temp_dir = $upload_dir['basedir'] . '/tmp';
		$full_upload_dir = $temp_dir . '/' . $_POST['uploadFolder'];

		//Scan the temp directory and delete any folders older than 6 hours (21600s)
		$temp_dir_children = scandir($temp_dir);
		foreach($temp_dir_children as $folder) {
			if(strlen($folder) > 5) {
				$full_folder_dir = $temp_dir . '/' . $folder;
				$current_time = time();
				$last_modified = filectime($full_folder_dir);
				$time_difference = $current_time - $last_modified;
				if($time_difference > 21600 && $full_folder_dir != $full_upload_dir) {
					array_map('unlink', glob($full_folder_dir . '/*'));
					rmdir($full_folder_dir);
				}
			}
		}

		if(!file_exists($full_upload_dir)) {
			mkdir($full_upload_dir);
		} else {
			array_map('unlink', glob($full_upload_dir . '/*'));
		}

		$final_file_name = $full_upload_dir . '/' . strtolower(sanitize_file_name(trim($_FILES['file-0']['name'])));
		rename(trim($_FILES['file-0']['tmp_name']), $final_file_name);

		$img_info = getimagesize($final_file_name);
		switch ($img_info['mime']) {
			// case 'image/png':
			// 	$previous_file_name = $final_file_name;
			// 	$final_file_name = str_replace('png', 'jpg', $final_file_name);
			// 	$image = imagecreatefrompng($previous_file_name);
			// 	imagejpeg($image, $final_file_name, 90);
			// 	imagedestroy($image);
			// 	unlink($previous_file_name);
			// 	break;
			
			default:
				break;
		}

		chmod($final_file_name, 0644);

		//fix orientation
	    $exif = @exif_read_data($final_file_name);
	    if (!empty($exif['Orientation'])) {
	        $imageResource = imagecreatefromjpeg($final_file_name);
	        switch ($exif['Orientation']) {
	            case 3:
	                $image = imagerotate($imageResource, 180, 0);
	                break;
	            case 6:
	                $image = imagerotate($imageResource, -90, 0);
	                break;
	            case 8:
	                $image = imagerotate($imageResource, 90, 0);
	                break;
	            default:
	                $image = $imageResource;
	        }
	        imagejpeg($image, $final_file_name, 90);
	    }

		echo str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $final_file_name);
	}
?>

