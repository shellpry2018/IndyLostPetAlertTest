<?php
$post_content = 
'<div class="report-post-body update-previous">';

$post_content .=
	'<div class="post-header-image">
		<img class="size-medium aligncenter" src="' . wp_get_attachment_url($pet_image) . '" alt="" />
	</div>';

$post_content .= 
	'<div class="section-header">Email:</div>
	<div class="color-value">' . $email . '</div>';

$post_content .= 
	'<div class="section-header">Contact Information:</div>
	<div class="color-value">' . preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone) . '</div>';

if($pet_name) {
	$post_content .= 
		'<div class="section-header">Pet Name if possible:</div>
		<div class="color-value">' . $pet_name . '</div>';
}

$post_content .= 
	'<div class="section-header">Pet Update:</div>
	<div class="color-value">' . $variable_names['update_type']['radio_options'][$update_type] . '</div>';

switch ($update_type) {
	case 'my_pet_home':
		$post_content .= 
			'<div class="section-header">What got the pet home?:</div>
			<div class="color-value">' . $how_did_pet_get_home . '</div>';
		break;

	case 'found_pet_home':
		$post_content .= 
			'<div class="section-header">What got the pet home?:</div>
			<div class="color-value">' . $how_did_pet_get_home . '</div>';
		break;

	case 'taken_to_shelter':
		$post_content .= 
			'<div class="section-header">Which shelter was pet taken to?:</div>
			<div class="color-value">' . $which_shelter . '</div>';
		break;
	
	case 'pet_deceased':
		$post_content .= 
			'<div class="section-header">May we post a memorial for your pet?:</div>
			<div class="color-value">' . ucwords($pet_deceased) . '</div>';
		break;

	default:
		break;
}

$post_content .= 
	'<div class="section-header">What got pet home:</div>
	<div class="color-value">' . $email . '</div>';

$post_content .= '</div>';
?>