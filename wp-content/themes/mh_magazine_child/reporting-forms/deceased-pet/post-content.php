<?php
$post_content = 
'<div class="report-post-body deceased-pet">';

$post_content .= 
	'<div class="section-header">Location Information:</div>
	<div class="color-value">';
	$post_content .= ($nearest_city) ? $nearest_city . ', ' : '';
	$post_content .= ($nearest_intersection) ? $nearest_intersection . ', ' : '';
	$post_content .= ($nearest_neighborhood) ? $nearest_neighborhood . ', ' : '';
	$post_content .= ($nearest_county) ? ucwords(str_replace('County', '', $nearest_county)) . ' County' : '';
	$post_content .= '</div>';

$post_content .= 
	'<div class="section-header">Contact Information:</div>
	<div class="color-value">' . preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone) . '</div>';

$post_content .= 
	'<div class="section-header">Deceased Pet Sighting Information:</div>
	<div class="color-value">' . date('m/d/Y', strtotime($date_sighted)) . '</div>
	<div class="color-value">' . $pet_description . '</div>';

$post_content .= 
	'<div class="section-header">Is a Picture Available, if Requested?</div>
	<div class="color-value">' . ucwords($image_available) . '</div>';

$post_content .= 
	'<div class="footer-vendor-image">
		<img class="size-full" src="' . get_theme_mod('sponsor_banner') . '" alt="sponsor-banner">
	</div>';

$post_content .= '<iframe style="border: 0;" src="https://www.google.com/maps/embed/v1/place?key=' . get_google_api_key() . '&amp;q=' . $zip_code . '&amp;zoom=11" width="425" height="350" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
?>