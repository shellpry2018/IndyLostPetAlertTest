<?php $full_field_name = ($post_id) ? $input_name . '_' . $post_id : $input_name . '_new' ?>
<label class="customizer-field" style="width: 100%; margin-bottom: 50px" for="<?php echo $input_name ?>"><?php echo $input_description ?>
	<input type="hidden" id="<?php echo $full_field_name ?>" name="<?php echo $input_name ?>">
    <?php if($post_id && $input_value) : ?>
    <img id="<?php echo $full_field_name ?>-image-preview" src="<?php echo ($post_id) ? wp_get_attachment_url($input_value) : '' ?>" style="display: block; margin: auto">
    <?php else : ?>
    <div id="<?php echo $full_field_name ?>-placeholder" class="image-placeholder">No image selected</div>
	<?php endif ?>

	<div class="progress-area" style="display:none">
		<h4 class="progress-status"></h4>
		<progress value="0" max="100" class="img-upload-bar">
			<div class="progress-bar">
				<span></span>
			</div>
		</progress>
		<p id="loaded_n_total"></p>
	</div>

	<label for="<?php echo $full_field_name ?>-button" class="form-button">Choose File</label>
	<input id="<?php echo $full_field_name ?>-button" type="file" style="display:none">
</label>


