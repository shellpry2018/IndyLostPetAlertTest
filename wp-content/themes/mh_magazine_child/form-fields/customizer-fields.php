<?php 
$field_type_templates = [
	'image',
	'zipcode',
	'datepicker',
	'timepicker',
	'radio',
	'textarea',
	'categories',
	'category-children',
	'hidden',
	'phone',
	// 'select',
];
?>
<?php foreach($fields as $field_name => $field_info) : ?>

	<?php 
		$input_name = $field_name;
		$input_description = $field_info['description'];
		$input_value = ($post_id) ? get_field($field_name, $post_id) : '';
		$required_label = (isset($field_info['required']) && !$field_info['required']) ? '' : ' <span style="color:#F01D1D">*</span>';
		$required_input = ((isset($field_info['required']) && !$field_info['required']) || isset($field_info['hidden']) && $field_info['hidden']) ? '' : ' required';
	?>

	<?php if(in_array($field_info['type'], $field_type_templates)) : ?>

		<?php include(locate_template('form-fields/fields/' . $field_info['type'] . '.php')) ?>

	<?php else : ?>

	<label class="customizer-field" id="<?php echo $input_name ?>" for="<?php echo $field_name ?>" <?php echo(isset($field_info['hidden']) && $field_info['hidden']) ? 'style="display:none"' : '' ?>><?php echo $field_info['description'] ?><?php echo $required_label ?>
		<input type="<?php echo $field_info['type'] ?>" name="<?php echo $field_name ?>" value="<?php echo ($post_id) ? get_field($field_name, $post_id) : '' ?>"<?php echo $required_input ?>>
	</label>
	
	<?php endif ?>
<?php endforeach ?>