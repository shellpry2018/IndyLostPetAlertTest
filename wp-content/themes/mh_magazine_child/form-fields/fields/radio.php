<label class="customizer-field" id="<?php echo $input_name ?>" for="<?php echo $input_name ?>" <?php echo(isset($field_info['hidden']) && $field_info['hidden']) ? 'style="display:none"' : '' ?>><?php echo $input_description ?><?php echo $required_label ?>
<?php foreach($field_info['radio_options'] as $option_value => $option_name) : ?>
	<?php if($option_value == 'other') : ?>
 	<div class="radio-button"><input type="radio" id="<?php echo $input_name . '_' . $option_value ?>" name="<?php echo $input_name ?>" value="<?php echo $option_value ?>"<?php echo $required_input ?>><label for="<?php echo $input_name . '_' . $option_value ?>"><?php echo $option_name ?> <input type="text" name="<?php echo $input_name ?>" style="display:none; margin:0 25px"></label></div>
	<?php else : ?>
 	<div class="radio-button"><input type="radio" id="<?php echo $input_name . '_' . $option_value ?>" name="<?php echo $input_name ?>" value="<?php echo $option_value ?>"<?php echo $required_input ?>><label for="<?php echo $input_name . '_' . $option_value ?>"><?php echo $option_name ?></label></div>
	<?php endif ?>
<?php endforeach ?>
</label>
