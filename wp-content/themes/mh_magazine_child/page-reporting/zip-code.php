<?php
global $wpdb;
$organized_entries = [];

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead_detail where 
	(form_id = 2 and field_number = 17.5) 
	or (form_id = 3 and field_number = 17.5) 
	limit 60000');

foreach($gravity_forms_entries as $entry) {
	$organized_entries[$entry->value][] = $entry->lead_id;
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 100000');

foreach($wp_report_query as $entry) {
	$zip_code = get_field('zip_code', $entry->ID);
	if($zip_code) $organized_entries[$zip_code][] = $entry->ID;
}

uasort($organized_entries, function ($a, $b){
    return  count($b) - count($a);
});
?>

<h2>Results by Zip Code</h2>
<?php foreach($organized_entries as $zipcode_number => $zipcode_results) : ?>
	<?php 
		echo '<div><div class="result-title">' . $zipcode_number . '</div><div class="result-value">' . count($zipcode_results) . '</div></div>';
	?>
<?php endforeach ?>
<div style="height:50px"></div>