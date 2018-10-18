<?php
$post_content = 
'<div class="report-post-body pet-sighting">
	<div class="post-header-image">
		<img class="size-full aligncenter" src="http://www.indylostpetalert.com/wp-content/uploads/2016/11/Pet-Sighting-Alert.png" alt="pet-sighting-alert" />
	</div>';

if($pet_image) $post_content .=
	'<div class="post-header-image pet-image">
		<img class="size-medium aligncenter" src="' . wp_get_attachment_url($pet_image) . '" alt="" />
	</div>';

$post_content .= '<div class="pet-information">';

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
	'<div class="section-header">Pet Sighting Information:</div>
	<div class="color-value">' . date('m/d/Y', strtotime($date_sighted)) . ' ' . date('g:i a', strtotime($time_sighted)) . '</div>
	<div class="color-value">' . $pet_description . '</div>';

$post_content .= '</div>';

$post_content .= 
	'<div class="footer-vendor-image">
		<img class="size-full" src="' . get_theme_mod('sponsor_banner') . '" alt="sponsor-banner">
	</div>';

$post_content .= '<iframe style="border: 0;" src="https://www.google.com/maps/embed/v1/place?key=' . get_google_api_key() . '&amp;q=' . $zip_code . '&amp;zoom=11" width="425" height="350" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>';
?>