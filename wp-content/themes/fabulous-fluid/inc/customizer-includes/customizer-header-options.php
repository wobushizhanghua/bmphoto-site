<?php
/**
 * The template for adding Additional Header Option in Customizer
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

	// Header Options
	$wp_customize->add_setting( 'enable_featured_header_image', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['enable_featured_header_image'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$fabulous_fluid_enable_featured_header_image_options = fabulous_fluid_enable_featured_header_image_options();
	$choices = array();
	foreach ( $fabulous_fluid_enable_featured_header_image_options as $fabulous_fluid_enable_featured_header_image_option ) {
		$choices[$fabulous_fluid_enable_featured_header_image_option['value']] = $fabulous_fluid_enable_featured_header_image_option['label'];
	}

	$wp_customize->add_control( 'enable_featured_header_image', array(
			'choices' => $choices,
			'label'   => esc_html__( 'Enable Featured Header Image on ', 'fabulous-fluid' ),
			'priority'=> 1,
			'section' => 'header_image',
	        'settings'=> 'enable_featured_header_image',
	        'type'    => 'select',
	) );

	$wp_customize->add_setting( 'featured_image_size', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_image_size'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$fabulous_fluid_featured_image_size_options = fabulous_fluid_featured_image_size_options();
	$choices = array();
	foreach ( $fabulous_fluid_featured_image_size_options as $fabulous_fluid_featured_image_size_option ) {
		$choices[$fabulous_fluid_featured_image_size_option['value']] = $fabulous_fluid_featured_image_size_option['label'];
	}

	$wp_customize->add_control( 'featured_image_size', array(
			'choices'  	=> $choices,
			'label'		=> esc_html__( 'Page/Post Featured Image Size', 'fabulous-fluid' ),
			'section'   => 'header_image',
			'settings'  => 'featured_image_size',
			'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'featured_header_image_alt', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_alt'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'featured_header_image_alt', array(
			'label'		=> esc_html__( 'Featured Header Image Alt/Title Tag ', 'fabulous-fluid' ),
			'section'   => 'header_image',
	        'settings'  => 'featured_header_image_alt',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'featured_header_image_url', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'featured_header_image_url', array(
			'label'		=> esc_html__( 'Featured Header Image Link URL', 'fabulous-fluid' ),
			'section'   => 'header_image',
	        'settings'  => 'featured_header_image_url',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'featured_header_image_base', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_base'],
		'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'featured_header_image_base', array(
		'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'fabulous-fluid' ),
		'section'  	=> 'header_image',
		'settings' 	=> 'featured_header_image_base',
		'type'     	=> 'checkbox',
	) );
	// Header Options End
