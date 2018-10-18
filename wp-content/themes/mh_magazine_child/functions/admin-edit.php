<?php
	function admin_edit_display_post_meta_for_pages($post) {
		if($post->post_type == 'report') { 
?>
		<div class="postbox-container">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div id="mh_post_details" class="postbox ">
					<button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Post Options</span><span class="toggle-indicator" aria-hidden="true"></span></button>
					<h2 class="hndle ui-sortable-handle"><span>Form Fields</span></h2>
					<div class="inside">
						<?php $post_id = $post->ID ?>
						<?php include(locate_template('reporting-forms/global/display-fields.php')) ?>
						<?php echo $field_display ?>
					</div>
				</div>
			</div>
		</div>

<?php
		}
	}
	add_action('edit_form_after_title', 'admin_edit_display_post_meta_for_pages');
?>
