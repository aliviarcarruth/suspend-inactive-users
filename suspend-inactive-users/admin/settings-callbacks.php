<?php // Suspend Inactive Users - Settings Callback

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// validate plugin settings
function suspendinactiveusers_callback_validate_options($input) {
	
	// todo: add validation functionality..
	
	return $input;
	
}

// callback: users section
function suspendinactiveusers_callback_section_users() {
	
	echo '<p>These settings enable you to select with user roles should be suspended due to inactivity.</p>';
	
}

// callback: text field
function suspendinactiveusers_callback_field_text( $args ) {
	
	$options = get_option( 'suspendinactiveusers_options', suspendinactiveusers_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="suspendinactiveusers_options_'. $id .'" name="suspendinactiveusers_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="suspendinactiveusers_options_'. $id .'">'. $label .'</label>';
	
}

// get active roles



// callback: checkbox field
function suspendinactiveusers_callback_field_checkbox( $args ) {
	
	$options = get_option( 'suspendinactiveusers_options', suspendinactiveusers_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
// starting to gather user roles - need to work on this functionality
	foreach (get_editable_roles() as $role_name => $role_info) {
		echo '<input id="suspendinactiveusers_options_'. $id .'" name="suspendinactiveusers_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
	echo '<label for="suspendinactiveusers_options_'. $id .'">'. $role_name .'</label>';

	}
	
}


