<?php 

$report_type = get_field('report_type', $post_id);
include(locate_template('reporting-forms/' . $report_type . '/variables.php'));
$field_display = '';
$email_attachments = [];

foreach($variable_names as $key => $field_info) {
	if(get_field($key, $post_id) && $field_info['type'] == 'image') {
		if(isset($is_email) && $is_email) {
			$upload_dir = wp_upload_dir();
			$temp_dir = $upload_dir['basedir'] . '/tmp';
			$file_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], wp_get_attachment_url(get_field($key, $post_id)));

			$file_name = basename($file_path);
			$email_attachments[$file_name] = $file_path;
		} else {
			$field_display .= 
			 '<div class="field" style="margin-bottom:20px">
				<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
				<p style="margin-top:5px">
					<img src="' . wp_get_attachment_url(get_field($key, $post_id)) . '" style="max-width: 300px">
				</p>
			</div>';
		}
	}
	elseif(get_field($key, $post_id) && $field_info['type'] == 'phone') {
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
			<p style="margin-top:5px">' . preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', get_field($key, $post_id)) . '</p>
		</div>';
	}
	elseif(get_field($key, $post_id) && $field_info['type'] == 'timepicker') {
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
			<p style="margin-top:5px">' . date('g:i a', strtotime(get_field($key, $post_id))) . '</p>
		</div>';
	}
	elseif($key == 'pet_deceased') {
		$value = ucwords(get_field($key, $post_id));
		$key = ucwords(str_replace('_', ' ', $key));
		$key = str_replace('Deceased', 'Memorial Requested', $key);
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . $key . '</h3>
			<p style="margin-top:5px">' . $value . '</p>
		</div>';
	}
	elseif($key == 'update_type') {
		$update_type = ucwords(str_replace('_', ' ', get_field($key, $post_id)));
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
			<p style="margin-top:5px">' . $update_type . '</p>
		</div>';
	}
	elseif(get_field($key, $post_id) && $field_info['type'] == 'radio') {
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
			<p style="margin-top:5px">' . ucwords(get_field($key, $post_id)) . '</p>
		</div>';
	}
	elseif(get_field($key, $post_id) && $key != 'report_type' && $key != 'post_categories') {
		$field_display .= 
		 '<div class="field" style="margin-bottom:20px">
			<h3 style="margin-bottom:0px">' . ucwords(str_replace('_', ' ', $key)) . '</h3>
			<p style="margin-top:5px">' . get_field($key, $post_id) . '</p>
		</div>';
	}
}
?>
