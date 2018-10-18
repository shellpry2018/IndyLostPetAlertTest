<?php 
	include(locate_template('reporting-forms/global/radio-options.php'));
	$variable_names = [
		'report_type' => [
			'description' => 'deceased_pet',
			'type' => 'hidden',
			'value' => 'deceased-pet',
			'category' => 'Deceased Pet',
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
            'description' => 'Date Deceased Pet Was Sighted',
            'type' => 'datepicker',
        ],
        'post_categories' => [
            'description' => 'What Type of Deceased Pet Was Sighted?',
            'type' => 'categories',
            'category_list' => [
            	'Deceased Dog Sighting',
            	'Deceased Cat Sighting',
            	'Deceased "Other Pet" Sightings',
            ],
        ],
        'pet_description' => [
            'description' => 'Description of Deceased Pet',
            'type' => 'textarea',
        ],
        'nearest_intersection' => [
            'description' => 'Nearest Intersection/Cross Streets Where Deceased Pet Was Sighted',
            'type' => 'textarea',
        ],
        'nearest_neighborhood' => [
            'description' => 'Nearest Neighborhood, Subdivision or Complex To Where The Deceased Pet Was Sighted? If None or Unknown, Leave Blank',
            'type' => 'textarea',
            'required' => false,
        ],
        'nearest_city' => [
            'description' => 'In What City/Town Was the Deceased Pet Found?',
            'type' => 'text',
        ],
        'nearest_county' => [
            'description' => 'In What County Was the Deceased Pet Found?',
            'type' => 'radio',
            'radio_options' => $county_list,
        ],
        'image_available' => [
            'description' => 'Is A Picture of This Pet Available if Needed?',
            'type' => 'radio',
            'radio_options' => $yes_no_options,
        ],
	];
?>