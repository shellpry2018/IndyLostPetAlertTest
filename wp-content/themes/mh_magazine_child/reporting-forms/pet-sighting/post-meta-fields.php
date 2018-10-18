<?php 
	include(locate_template('reporting-forms/global/radio-options.php'));
	$variable_names = [
		'report_type' => [
			'description' => 'pet_sighting',
			'type' => 'hidden',
			'value' => 'pet-sighting',
			'category' => 'Pet Sighting',
		],
        'first_name' => [
            'description' => 'First Name',
            'type' => 'text',
        ],
        'last_name' => [
            'description' => 'Last Name',
            'type' => 'text',
        ],
        'phone' => [
            'description' => 'Your Phone Number',
            'type' => 'phone',
        ],
        'alternate_phone' => [
            'description' => 'Alternative Phone Number (will not be posted on alert)',
            'type' => 'phone',
            'required' => false,
        ],
        'email' => [
            'description' => 'Email Address',
            'type' => 'email',
        ],
        'confirm_email' => [
            'description' => 'Confirm Email Address',
            'type' => 'email',
        ],
        'zip_code' => [
            'description' => 'Zip Code where the pet was sighted',
            'type' => 'zipcode',
        ],
        'date_sighted' => [
            'description' => 'Date Pet Was Sighted',
            'type' => 'datepicker',
        ],
        'time_sighted' => [
            'description' => 'Approximate Time Pet Was Sighted',
            'type' => 'timepicker',
        ],
        'post_categories' => [
            'description' => 'What Type of Pet Was Sighted?',
            'type' => 'categories',
            'category_list' => [
            	'Dog Sighting',
            	'Cat Sighting',
            	'"Other Pet" Sighting',
            ],
        ],
        'pet_description' => [
            'description' => 'Description of Pet Sighted',
            'type' => 'textarea',
        ],
        'nearest_intersection' => [
            'description' => 'Nearest Intersection/Cross Streets Where Pet Was Sighted',
            'type' => 'textarea',
        ],
        'nearest_neighborhood' => [
            'description' => 'Nearest Neighborhood, Subdivision or Complex To Where The Pet Was Sighted? If None or Unknown, Leave Blank',
            'type' => 'textarea',
            'required' => false,
        ],
        'nearest_city' => [
            'description' => 'In What City/Town Was the Pet Sighted?',
            'type' => 'text',
        ],
        'nearest_county' => [
            'description' => 'In What County Was the Pet Sighted?',
            'type' => 'radio',
            'radio_options' => $county_list,
        ],
        'pet_image' => [
            'description' => 'Post Picture of Pet Sighted (Not required, but very helpful)',
            'type' => 'image',
        ],
	];
?>