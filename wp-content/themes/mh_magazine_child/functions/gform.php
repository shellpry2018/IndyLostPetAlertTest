<?php
	function get_gform_type($form_number) {
		$form_names = [
			'2' => 'lost-pet',
			'3' => 'found-pet',
			'4' => 'pet-sighting',
			'5' => 'update-previous',
			'6' => 'deceased-pet',
		];

		return $form_names[$form_number];
	}

	function change_user_notification_attachments($notification, $form, $entry) {
	    $post = get_post($entry['post_id']);

	    $upload_field_id = ($form['id'] == 5) ? '45' : '41';

	    $thumbnail = get_the_post_thumbnail_url($post);
	    if($thumbnail)
	    {
	        $wp_upload_dir = wp_upload_dir();
	        $original_image_url = rgar($entry, $upload_field_id);
	        $server_url = str_replace($wp_upload_dir['baseurl'], $wp_upload_dir['basedir'], $thumbnail);  
	        print_r($thumbnail);   
	        echo '<br>'; 
	        print_r($server_url);    
	        $notification['attachments'][] = $server_url;
	    }
	    else
	    {
	        $images_urls = change_image_filename($entry, $post, $upload_field_id);
	        echo $images_urls['server_url'];
	        $notification['attachments'][] = $images_urls['server_url'];
	    }

	    return $notification;
	}
	add_filter('gform_notification', 'change_user_notification_attachments', 10, 3);


	function change_image_filename($entry, $post, $upload_field_id)
	{
	    $wp_upload_dir = wp_upload_dir();

	    $original_image_url = rgar($entry, $upload_field_id);

	    if(strlen($original_image_url) > 0) {
	        $image_url = str_replace('%20', '-', $original_image_url);
	        $image_url = str_replace('%28', '', $image_url);
	        $image_url = str_replace('%29', '', $image_url);

	        $original_server_url = str_replace($wp_upload_dir['baseurl'], $wp_upload_dir['basedir'], $original_image_url);  
	        $original_server_url = str_replace('%20', ' ', $original_server_url);
	        $original_server_url = str_replace('%28', '(', $original_server_url);
	        $original_server_url = str_replace('%29', ')', $original_server_url);

	        $server_url = str_replace($wp_upload_dir['baseurl'], $wp_upload_dir['basedir'], $image_url);  


	        $file_parts = explode('.', $server_url);
	        $file_ext = end($file_parts);
	        unset($file_parts[count($file_parts) - 1]);
	        $file_name = implode('.', $file_parts);

	        $root_dir = explode('/' , $file_name);
	        unset($root_dir[count($root_dir) - 1]);
	        $root_dir = implode('/', $root_dir);

	        $base_file_name_array = explode('.', basename($server_url));
	        $file_extension = strtolower($base_file_name_array[count($base_file_name_array) - 1]);
	        unset($base_file_name_array[count($base_file_name_array) - 1]);
	        $base_file_name = implode('.', $base_file_name_array);

	        $current_time = date('Ymd-Gis', time());

	        $file_name_array = explode('-', $base_file_name);

	        $new_server_url = $root_dir . '/' . implode('-', $file_name_array) . '__' . $current_time . '.' . $file_extension;
	        $image_url = str_replace($wp_upload_dir['basedir'], $wp_upload_dir['baseurl'], $new_server_url);

	        rename($original_server_url, $new_server_url);

	        $server_url = $new_server_url;

	        $file_parts = explode('.', $new_server_url);
	        $file_ext = end($file_parts);
	        if($file_ext == 'pdf')
	        {
	            $image_url = str_replace('.pdf', '-pdf.jpg', $image_url);  
	            $server_url = str_replace('.pdf', '-pdf.jpg', $server_url);
	        }

	        $post->post_content = str_replace($original_image_url, $image_url, $post->post_content);

	        $attach_id = find_media($image_url, $entry);

	        set_post_thumbnail($post, $attach_id);
	        wp_update_post($post);

	        //update the original form entry with the new image url
	        global $wpdb;
	        $wpdb->insert("{$wpdb->prefix}rg_lead_detail", array(
	            'value'         => $image_url,
	            'field_number'  => $upload_field_id,
	            'lead_id'       => $entry['id'],
	            'form_id'       => $entry['form_id']
	        ));
	    }

	    return ['server_url' => $server_url, 'image_url' => $image_url];
	}

	function set_post_content($entry, $form) {
	    $post = get_post($entry['post_id']);
	    $post->post_title .= ' - Entry #' . $entry['id'];
	    wp_update_post($post);
	}
	add_action('gform_after_submission', 'set_post_content', 10, 2);

	function find_media($image_url, $entry)
	{
	    global $wpdb;
	    $all_attachments = $wpdb->get_results("SELECT * FROM wp_nwq5vs_postmeta WHERE meta_value = '" . $image_url . "'");

	    if(count($all_attachments) > 0)
	    {
	        $attach_id = $all_attachments[0]->post_id;
	    }
	    else
	    {
	        $image_base_url = basename($image_url);
	        $filetype = wp_check_filetype(basename($image_url), null);
	        $attachment = [
	            'guid'           => $server_url, 
	            'post_mime_type' => $filetype['type'],
	            'post_title'     => preg_replace('/\.[^.]+$/', '', $image_base_url),
	            'post_content'   => '',
	            'post_status'    => 'inherit'
	        ];
	        $attach_id = wp_insert_attachment($attachment, $image_url, $entry['post_id']);
	        require_once(ABSPATH . 'wp-admin/includes/image.php');
	        $attach_data = wp_generate_attachment_metadata($attach_id, $image_url);
	        wp_update_attachment_metadata($attach_id, $attach_data);
	    }

	    return $attach_id;
	}

	function all_fields_extra_options( $value, $merge_tag, $options, $field, $raw_value ) {
	    if ( $merge_tag != 'all_fields' ) {
	        return $value;
	    }

	    // usage: {all_fields:include[ID],exclude[ID,ID]}
	    $include = preg_match( "/include\[(.*?)\]/", $options , $include_match );
	    $include_array = explode( ',', rgar( $include_match, 1 ) );

	    $exclude = preg_match( "/exclude\[(.*?)\]/", $options , $exclude_match );
	    $exclude_array = explode( ',', rgar( $exclude_match, 1 ) );

	    $log = "all_fields_extra_options(): {$field->label}({$field->id} - {$field->type}) - ";

	    if ( $include && in_array( $field->id, $include_array ) ) {
	        switch ( $field->type ) {
	            case 'html' :
	                $value = $field->content;
	                break;
	            case 'section' :
	                $value .= sprintf( '<tr bgcolor="#FFFFFF">
	                                                        <td width="20">&nbsp;</td>
	                                                        <td>
	                                                            <font style="font-family: sans-serif; font-size:12px;">%s</font>
	                                                        </td>
	                                                   </tr>
	                                                   ', $field->description );
	                break;
	            case 'signature' :
	                $url = GFSignature::get_signature_url( $raw_value );
	                $value = "<img alt='signature' src='{$url}'/>";
	                break;
	        }
	        GFCommon::log_debug( $log . 'included.' );
	    }
	    if ( $exclude && in_array( $field->id, $exclude_array ) ) {
	        GFCommon::log_debug( $log . 'excluded.' );
	        return false;
	    }
	    return $value;
	}
	add_filter( 'gform_merge_tag_filter', 'all_fields_extra_options', 11, 5 );
?>