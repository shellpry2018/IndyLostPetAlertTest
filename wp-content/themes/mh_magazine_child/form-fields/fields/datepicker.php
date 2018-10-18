<?php $date = empty($input_value) || $input_value > new DateTime("tomorrow") ? date("m/d/Y") : $input_value; ?>
<label class="customizer-field" for="<?php echo $input_name ?>"><?php echo $input_description ?><?php echo $required_label ?>
	<input class="datepicker" name="<?php echo $input_name ?>" value="<?php echo $date ?>" <?php echo $required_input ?>>
</label>
