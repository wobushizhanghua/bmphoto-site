<?php
/**
 * The template for adding Featured Grid Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */
	// Featured Grid Content Options
	$wp_customize->add_section( 'fabulous_fluid_featured_grid_content', array(
		'priority'		=> 600,
		'title'			=> esc_html__( 'Featured Grid Content', 'fabulous-fluid' ),
	) );

	$wp_customize->add_setting( 'featured_grid_content_option', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_grid_content_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$content_options = fabulous_fluid_featured_slider_options();
	$choices = array();

	foreach ( $content_options as $content_option ) {
		$choices[$content_option['value']] = $content_option['label'];
	}

	$wp_customize->add_control( 'featured_grid_content_option', array(
		'choices'  	=> $choices,
		'label'    	=> esc_html__( 'Enable Featured Grid Content on', 'fabulous-fluid' ),
		'priority'	=> '1',
		'section'  	=> 'fabulous_fluid_featured_grid_content',
		'settings' 	=> 'featured_grid_content_option',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'featured_grid_content_type', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_grid_content_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$content_types = fabulous_fluid_featured_content_types();
	$choices = array();
	foreach ( $content_types as $content_type ) {
		$choices[$content_type['value']] = $content_type['label'];
	}

	$wp_customize->add_control( 'featured_grid_content_type', array(
		'active_callback'	=> 'fabulous_fluid_is_featured_grid_content_active',
		'choices'  	=> $choices,
		'label'    	=> esc_html__( 'Select Content Type', 'fabulous-fluid' ),
		'priority'	=> '3',
		'section'  	=> 'fabulous_fluid_featured_grid_content',
		'settings' 	=> 'featured_grid_content_type',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'featured_grid_content_number', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_grid_content_number'],
		'sanitize_callback'	=> 'fabulous_fluid_sanitize_number_range',
	) );

	$wp_customize->add_control( 'featured_grid_content_number' , array(
		'active_callback'	=> 'fabulous_fluid_is_demo_featured_grid_content_inactive',
		'description'	=> esc_html__( 'Save and refresh the page if No. of Featured Grid Content is changed (Max no of Featured Grid Content is 20)', 'fabulous-fluid' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> esc_html__( 'No of Featured Grid Content', 'fabulous-fluid' ),
		'priority'		=> '6',
		'section'  		=> 'fabulous_fluid_featured_grid_content',
		'settings' 		=> 'featured_grid_content_number',
		'type'	   		=> 'number',
		)
	);

	$wp_customize->add_setting( 'featured_grid_content_show', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_grid_content_show'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$fabulous_fluid_featured_grid_content_show = fabulous_fluid_featured_content_show();
	$choices = array();
	foreach ( $fabulous_fluid_featured_grid_content_show as $fabulous_fluid_featured_grid_content_shows ) {
		$choices[$fabulous_fluid_featured_grid_content_shows['value']] = $fabulous_fluid_featured_grid_content_shows['label'];
	}

	$wp_customize->add_control( 'featured_grid_content_show', array(
		'active_callback'	=> 'fabulous_fluid_is_demo_featured_grid_content_inactive',
		'choices'  	=> $choices,
		'label'    	=> esc_html__( 'Display Content', 'fabulous-fluid' ),
		'priority'	=> '6.1',
		'section'  	=> 'fabulous_fluid_featured_grid_content',
		'settings' 	=> 'featured_grid_content_show',
		'type'	  	=> 'select',
	) );

	$priority	=	7;

	//Get featured slides humber from theme options
	$featured_grid_content_number	= apply_filters( 'fabulous_fluid_get_option', 'featured_grid_content_number' );

	//loop for featured post content
	for ( $i=1; $i <= $featured_grid_content_number ; $i++ ) {
		$wp_customize->add_setting( 'featured_grid_content_page_'. $i, array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'fabulous_fluid_sanitize_page',
		) );

		$wp_customize->add_control( 'featured_grid_content_page_'. $i, array(
			'active_callback'	=> 'fabulous_fluid_is_featured_page_grid_content_active',
			'label'    	=> esc_html__( 'Featured Page', 'fabulous-fluid' ) . ' ' . $i,
			'priority'	=> '5' . $i,
			'section'  	=> 'fabulous_fluid_featured_grid_content',
			'settings' 	=> 'featured_grid_content_page_'. $i,
			'type'	   	=> 'dropdown-pages',
		) );
	}

	$wp_customize->add_setting( 'featured_grid_content_loadmore', array(
			'capability'        => 'edit_theme_options',
			'default'           => $defaults['featured_grid_content_loadmore'],
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'featured_grid_content_loadmore' , array(
			'active_callback' => 'fabulous_fluid_is_featured_grid_content_active',
			'description'     => esc_html__( 'Applicable when number of items is more than three', 'fabulous-fluid' ),
			'label'           => esc_html__( 'Load More Text', 'fabulous-fluid' ),
			'section'         => 'fabulous_fluid_featured_grid_content',
			'settings'        => 'featured_grid_content_loadmore',
			'type'            => 'text'
		)
	);
// Featured Grid Content Setting End
