<?php
	function ilpa_customize_register($wp_customize) {
		$section_name = 'sponsor_logos';		
		$wp_customize->add_section($section_name, [
		    'title'      => __( 'Sponsor Logos', 'mytheme' ),
		    'priority'   => 30,
		]);
			$setting_name = 'sponsor_banner';
			$wp_customize->add_setting($setting_name);
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_name, [
               'label'      => __('Sponsor Banner', 'mh_magazine_child'),
               'section'    => $section_name,
               'settings'   => $setting_name,
			]));
	}
	add_action('customize_register', 'ilpa_customize_register');
?>