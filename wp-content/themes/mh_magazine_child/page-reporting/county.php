<?php
global $wpdb;
$organized_entries = [];

//-----Gravity Forms Results-----
$gravity_forms_entries = $wpdb->get_results('SELECT * FROM wp_nwq5vs_rg_lead_detail where 
	(form_id = 2 and field_number = 39) 
	or (form_id = 3 and field_number = 39) 
	or (form_id = 4 and field_number = 39) 
	or (form_id = 6 and field_number = 40) 
	limit 60000');

foreach($gravity_forms_entries as $entry) {
	$county_name = ucwords($entry->value);
	$county_name_array = explode(' ', $county_name);
	if(!in_array('County', $county_name_array)) $county_name .= ' County';
	$organized_entries[$county_name][] = $entry->lead_id;
}

//-----Wordpress Report Results-----
$wp_report_query = $wpdb->get_results('SELECT * FROM wp_nwq5vs_posts 
	where post_type = "report" and post_date > "' . get_timestamp_minus_one_year() . '" ORDER BY post_date limit 100000');

foreach($wp_report_query as $entry) {
	$county_name = get_field('nearest_county', $entry->ID);
	if($county_name) {
		$county_name = ucwords($county_name);
		$county_name_array = explode(' ', $county_name);
		if(!in_array('County', $county_name_array)) $county_name .= ' County';
		$organized_entries[$county_name][] = $entry->ID;
	}
}

uasort($organized_entries, function ($a, $b){
    return count($b) - count($a);
});
?>

<h2>Results by County</h2>
<?php foreach($organized_entries as $county_name => $county_results) : ?>
	<?php 
		echo '<div><div class="result-title">' . $county_name . '</div><div class="result-value">' . count($county_results) . '</div></div>';
	?>
<?php endforeach ?>
<div style="height:50px"></div>