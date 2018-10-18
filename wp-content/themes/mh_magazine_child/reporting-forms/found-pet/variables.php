<?php
    //Custom Fields
    include(locate_template('reporting-forms/found-pet/post-meta-fields.php'));
	foreach($variable_names as $variable_name => $variable_info) {
		$$variable_name = get_field($variable_name, $post_id);
	}
?>