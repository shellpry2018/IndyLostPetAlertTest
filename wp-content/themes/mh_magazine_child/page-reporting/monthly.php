<?php 
global $wpdb;
$organized_entries = [];

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead 
	WHERE date_created > "' . get_timestamp_minus_one_year() . '" ORDER BY date_created ASC');

foreach($gravity_forms_entries as $entry) {
	$month = date('Y-m', strtotime($entry->date_created));
	$organized_entries[$month][] = $entry->id;
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 100000');

foreach($wp_report_query as $entry) {
	$month = date('Y-m', strtotime($entry->post_date));
	$organized_entries[$month][] = $entry->ID;
}
?>

<h2>Bi-Monthly Results</h2>
<?php $monthly_value = 0 ?>
<?php foreach($organized_entries as $month_name => $month) : ?>
	<?php 
		$date_array = explode('-', $month_name);
		$year_number = $date_array[0];
		$month_number = $date_array[1];

		if($month_number % 2 != 0) { //Odd month
			$monthly_value = count($month);
		} else {
			$monthly_value += count($month);

    		$date_format = 'M';

    		$previous_month = $month_number - 1;

    		$start_month = date($date_format, strtotime($year_number . '-' . $previous_month . '-01'));
    		$end_month = date($date_format, strtotime($year_number . '-' . $month_number . '-01'));

    		echo '<div><div class="result-title">' . $start_month . '-' . $end_month . ' ' . $year_number . '</div>';
    		echo '<div class="result-value">' . $monthly_value . '</div></div>';
		}

	?>
<?php endforeach ?>
<div style="height:50px"></div>


<h2>Monthly Results</h2>
<?php foreach($organized_entries as $month_name => $month) : ?>
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