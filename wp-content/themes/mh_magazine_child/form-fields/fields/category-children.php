<?php 

$other_categories = [
	'"Other Pet" Sighting',
	'Deceased "Other Pet" Sightings',
	'Found "Other Pets"',
	'Lost "Other Pets"',
];

$main_categories = [];
$child_categories = [];
foreach($field_info['category_list'] as $category_name) {
	$category_id = get_cat_ID($category_name);
	$category_object = get_category($category_id);

	$main_categories[$category_id] = $category_name;

	$category_children = get_categories(['parent' => $category_id, 'hide_empty' => '0']);
	foreach($category_children as $child) {
		$child_categories[$category_id][$child->term_id] = $child->name;
	}
}
?>

<label class="customizer-field" for="<?php echo $input_name ?>"><?php echo $input_description ?><?php echo $required_label ?>
<?php foreach($main_categories as $option_value => $option_name) : ?>
 	<div class="radio-button"><input type="radio" category-id="<?php echo $option_value ?>" id="<?php echo $input_name . '_' . $option_value ?>" class="category-parent" name="<?php echo $input_name . '__parent' ?>" value="<?php echo $option_value ?>"<?php echo $required_input ?>><label for="<?php echo $input_name . '_' . $option_value ?>"><?php echo $option_name ?></label></div>
<?php endforeach ?>
</label>

<?php foreach($main_categories as $parent_id => $parent_name) : ?>
	<?php if(array_key_exists($parent_id, $child_categories)) : ?>

		<?php if(in_array($parent_name, $other_categories)) : ?>
		<label class="customizer-field child-category" parent-category-id="<?php echo $parent_id ?>" donotrequire="true" for="<?php echo $input_name . '__child_of_' . $parent_id ?>" style="display:none">What Category of <?php echo $main_categories[$parent_id] ?>?
			<select class="field" name="<?php echo $input_name . '__child_of_' . $parent_id ?>" value="<?php echo $input_value ?>">
				<option disabled selected value>Please Select</option>
				<?php foreach($child_categories[$parent_id] as $child_id => $child_name) : ?>
					<option value="<?php echo $child_id ?>"><?php echo $child_name ?></option>
				<?php endforeach ?>
			</select>
		</label>
		<label class="customizer-field child-category" parent-category-id="<?php echo $parent_id ?>" for="<?php echo $input_name . '__child_of_' . $parent_id ?>" style="display:none">If <?php echo $parent_name ?>, Please Describe<?php echo $required_label ?>
			<textarea class="field" type="<?php echo $field_info['type'] ?>" name="<?php echo $input_name . '__child_of_' . $parent_id . '_description' ?>"><?php echo $input_value ?></textarea>
		</label>
		<?php else : ?>
		<label class="customizer-field child-category" parent-category-id="<?php echo $parent_id ?>" for="<?php echo $input_name . '__child_of_' . $parent_id ?>" style="display:none">What Category of <?php echo $main_categories[$parent_id] ?>?<?php echo $required_label ?>
			<select class="field" name="<?php echo $input_name . '__child_of_' . $parent_id ?>" value="<?php echo $input_value ?>">
				<option disabled selected value>Please Select</option>
				<?php foreach($child_categories[$parent_id] as $child_id => $child_name) : ?>
					<option value="<?php echo $child_id ?>"><?php echo $child_name ?></option>
				<?php endforeach ?>
			</select>
		</label>
		<?php endif ?>

	<?php else : ?>
	<label class="customizer-field child-category" parent-category-id="<?php echo $parent_id ?>" for="<?php echo $input_name . '__child_of_' . $parent_id ?>" style="display:none">If <?php echo $parent_name ?>, Please Describe<?php echo $required_label ?>
		<textarea class="field" type="<?php echo $field_info['type'] ?>" name="<?php echo $input_name . '__child_of_' . $parent_id ?>"><?php echo $input_value ?></textarea>
	</label>
	<?php endif ?>
<?php endforeach ?>