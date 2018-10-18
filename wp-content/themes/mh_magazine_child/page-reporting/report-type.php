<?php 
global $wpdb;
$organized_entries = [];

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead 
	WHERE date_created > "' . get_timestamp_minus_one_year() . '" ORDER BY date_created ASC');


foreach($gravity_forms_entries as $entry) {
	$form_type = get_gform_type($entry->form_id);
	$month = date('Y-m', strtotime($entry->date_created));
	$organized_entries[$form_type][$month][] = $entry->id;
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 60000');

foreach($wp_report_query as $entry) {
	$form_type = get_field('report_type', $entry->ID);
	$month = date('Y-m', strtotime($entry->post_date));

	if($form_type) $organized_entries[$form_type][$month][] = $entry->ID;
}
?>

<h2>Monthly Results by Report Type</h2>
<div style="height:30px"></div>
<?php foreach($organized_entries as $form_type => $month_totals) : ?>
	<h3><?php echo ucwords(str_replace('-', ' ', $form_type)) ?></h3>
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
<?php endforeach ?>