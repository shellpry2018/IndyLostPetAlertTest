<?php 
global $wpdb;
$organized_entries = [];

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead 
	WHERE date_created > "' . get_timestamp_minus_one_year() . '" ORDER BY date_created ASC');

foreach($gravity_forms_entries as $entry) {
	$week = date('Y-W', strtotime($entry->date_created));
	$organized_entries[$week][] = $entry->id;
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 100000');

foreach($wp_report_query as $entry) {
	$week = date('Y-W', strtotime($entry->post_date));
	$organized_entries[$week][] = $entry->ID;
}
?>

<h2>Weekly Results</h2>
<?php foreach($organized_entries as $week_name => $week) : ?>
	<?php 
		$date_array = explode('-', $week_name);
		$year_number = $date_array[0];
		$week_number = $date_array[1];

		$date_format = 'M j';

		$start_date = date($date_format, strtotime($year_number . 'W' . $week_number . '1'));
		$end_date = date($date_format, strtotime($year_number . 'W' . $week_number . '7'));

		echo '<div><div class="result-title">' . $start_date . ' - ' . $end_date . ' ' .  $year_number .'</div>';
		echo '<div class="result-value">' . count($week) . '</div></div>'; 
	?>
<?php endforeach ?>
<div style="height:50px"></div>