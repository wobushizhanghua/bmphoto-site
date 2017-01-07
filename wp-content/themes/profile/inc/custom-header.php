<?php
function profile_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'profile_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/images/header.jpg',
		'default-text-color'     => '000000',
		'width'                  => 1980,
		'height'                 => 400,    
		'header-text'            => false,        
		'flex-height'            => true,
		'flex-width'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'profile_custom_header_setup' );