<?php 
	include(locate_template('reporting-forms/global/radio-options.php'));
	$variable_names = [
		'report_type' => [
			'description' => 'update_previous',
			'type' => 'hidden',
			'value' => 'update-previous',
			'category' => 'Update Previous',
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
        'email' => [
            'description' => 'Email Address',
            'type' => 'email',
        ],
        'confirm_email' => [
            'description' => 'Confirm Email Address',
            'type' => 'email',
        ],
        'pet_name' => [
            'description' => 'Pet\'s Name (if possible)',
            'type' => 'text',
        ],
        'update_type' => [
            'description' => 'What is the update?',
            'type' => 'radio',
            'radio_options' => get_update_type_options(),
        ],
        'how_did_pet_get_home' => [
        	'description' => 'What got the pet home?',
        	'type' => 'radio',
        	'radio_options' => $pet_home_options,
        	'hidden' => true,
        ],
        'which_shelter' => [
        	'description' => 'Which shelter was pet taken to?',
        	'type' => 'text',
        	'hidden' => true,
        ],
        'pet_deceased' => [
        	'description' => 'May we post a memorial for your pet?',
        	'type' => 'radio',
        	'radio_options' => $yes_no_options,
        	'hidden' => true,
        ],
        'pet_image' => [
            'description' => 'Upload Reunion Picture or Additional Picture Here',
            'type' => 'image',
        ],
	];
?>