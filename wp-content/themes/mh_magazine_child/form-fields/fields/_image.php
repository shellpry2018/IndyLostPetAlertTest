<?php $full_field_name = ($post_id) ? $input_name . '_' . $post_id : $input_name . '_new' ?>
<label class="customizer-field" style="width: 100%" for="<?php echo $input_name ?>"><?php echo $input_description ?>
    <input type="hidden" id="<?php echo $full_field_name ?>" name="<?php echo $input_name ?>" value="<?php echo $input_value ?>">
    <?php if($post_id && $input_value) : ?>
    <img id="<?php echo $full_field_name ?>-image-preview" src="<?php echo ($post_id) ? wp_get_attachment_url($input_value) : '' ?>" style="display: block; margin: auto">
    <div id="<?php echo $full_field_name ?>-remove-button" class="section-customizer-remove-button form-button">Remove Image</div>
    <?php else : ?>
    <div id="<?php echo $full_field_name ?>-placeholder" class="image-placeholder">No image selected</div>
	<?php endif ?>
    <div id="<?php echo $full_field_name ?>-upload-button" class="section-customizer-upload-button form-button">Choose Image</div>
</label>