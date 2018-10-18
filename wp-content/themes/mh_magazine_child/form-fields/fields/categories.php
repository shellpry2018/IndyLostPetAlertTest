<?php 

$main_categories = [];
foreach($field_info['category_list'] as $category_name) {
	$category_id = get_cat_ID($category_name);
	$category_object = get_category($category_id);

	$main_categories[$category_id] = $category_name;
}

?>
<label class="customizer-field" for="<?php echo $input_name ?>"><?php echo $input_description ?><?php echo $required_label ?>
<?php foreach($main_categories as $option_value => $option_name) : ?>
	<?php if($option_value == 'other') : ?>
 	<div class="radio-button"><input type="radio" id="<?php echo $input_name . '_' . $option_value ?>" name="<?php echo $input_name ?>" value="<?php echo $option_value ?>"<?php echo $required_input ?>><label for="<?php echo $input_name . '_' . $option_value ?>"><?php echo $option_name ?> <input type="text" name="<?php echo $input_name ?>" style="display:none; margin:0 25px"></label></div>
	<?php else : ?>
 	<div class="radio-button"><input type="radio" id="<?php echo $input_name . '_' . $option_value ?>" name="<?php echo $input_name ?>" value="<?php echo $option_value ?>"<?php echo $required_input ?>><label for="<?php echo $input_name . '_' . $option_value ?>"><?php echo $option_name ?></label></div>
	<?php endif ?>
<?php endforeach ?>
</label>
