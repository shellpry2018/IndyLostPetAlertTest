<label class="customizer-field" id="<?php echo $input_name ?>" for="<?php echo $input_name ?>" <?php echo(isset($field_info['hidden']) && $field_info['hidden']) ? 'style="display:none"' : '' ?>><?php echo $input_description ?><?php echo $required_label ?>
	<textarea type="<?php echo $field_info['type'] ?>" name="<?php echo $input_name ?>"<?php echo $required_input ?> maxlength="200"><?php echo $input_value ?></textarea>
</label>
