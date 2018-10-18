<?php 
global $wpdb;
$organized_entries = [];

include(locate_template('reporting-forms/global/radio-options.php'));

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead_detail where 
	form_id = 5 and field_number = 43 limit 60000');

foreach($gravity_forms_entries as $entry) {
	$result = $entry->value;

	if(in_array($result, $pet_home_options)) {
		$form_object = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead where id = ' . $entry->lead_id);

		if($form_object[0]->date_created >= get_timestamp_minus_one_year()) {
			$month = date('Y-m', strtotime($form_object[0]->date_created));
			$organized_entries[$result][$month][] = $entry->id;
		}
	}
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 60000');

foreach($wp_report_query as $entry) {
	$result_value = get_field('how_did_pet_get_home', $entry->ID);
	if(in_array($result_value, $pet_home_options)) {
		$result = $pet_home_options[$result_value];
		$month = date('Y-m', strtotime($entry->post_date));
		$organized_entries[$result][$month][] = $entry->ID;
	}
}
?>

<h2>Monthly Results by How Pet Got Home</h2>
<div style="height:30px"></div>
<?php foreach($organized_entries as $result => $month_totals) : ?>
	<?php 
		$result_total = 0;
		foreach($month_totals as $month) {
			$result_total += count($month);
		}
	?>
	<?php if($result_total >= 3) : ?>
		<h3><?php echo ucwords(str_replace('-', ' ', $result)) ?></h3>
		<?php foreach($month_totals as $month_name => $month) : ?>
			<?php 
				$date_array = explode('-', $month_name);
				$year_number = $date_array[0];
				$month_number = $date_array[1];

				$date_format = 'M Y';

				$month_value = date($date_format, strtotime($year_number . '-' . $month_number . '-01'));

				echo '<div><div class="result-title">' . $month_value . '</div><div class="result-value">' . count($month) . '</div></div>';
			?>
		<?php endforeach ?>
		<div style="height:50px"></div>
	<?php endif ?>
<?php endforeach ?>