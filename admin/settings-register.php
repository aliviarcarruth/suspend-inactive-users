<?php // Suspend Inactive Users - Settings Register

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// register plugin settings
function suspendinactiveusers_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
	);
	
	*/
	
	register_setting( 
		'suspendinactiveusers_options', 
		'suspendinactiveusers_options', 
		'suspendinactiveusers_callback_validate_options' 
	); 

	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/

	add_settings_section( 
		'suspendinactiveusers_section_users', 
		'Customize Inactive Users Settings', 
		'suspendinactiveusers_callback_section_users', 
		'suspendinactiveusers'
	);

	/*

	add_settings_field(
    	string   $id,
		string   $title,
		callable $callback,
		string   $page,
		string   $section = 'default',
		array    $args = []
	);

	*/

	add_settings_field(
		'suspend_user_roles',
		'Which User Roles to Suspend?',
		'suspendinactiveusers_callback_field_checkbox', //this needs to be checkbox with roles listed
		'suspendinactiveusers',
		'suspendinactiveusers_section_users',
		[ 'id' => 'suspend_user_roles', 'label' => 'Subscriber' ] // To Do - loop through user roles
	);

	add_settings_field(
		'time_user_inactive',
		'Months Users are Inactive',
		'suspendinactiveusers_callback_field_text',
		'suspendinactiveusers',
		'suspendinactiveusers_section_users',
		[ 'id' => 'time_user_inactive', 'label' => 'How many months should a user be inactive before marked as inactive?' ]
	);

}
add_action( 'admin_init', 'suspendinactiveusers_register_settings' );
