<?php
/**
 * The template for adding Featured Slider Options in Customizer
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */
// Featured Slider
$wp_customize->add_section( 'fabulous_fluid_featured_slider', array(
	'priority'       => 400,
	'title'			=> esc_html__( 'Featured Slider', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'featured_slider_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_option'],
	'sanitize_callback' => 'sanitize_key',
) );

$featured_slider_content_options = fabulous_fluid_featured_slider_options();
$choices = array();
foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
	$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
}

$wp_customize->add_control( 'featured_slider_option', array(
	'choices'   => $choices,
	'label'    	=> esc_html__( 'Enable Slider on', 'fabulous-fluid' ),
	'priority'	=> '1.1',
	'section'  	=> 'fabulous_fluid_featured_slider',
	'settings' 	=> 'featured_slider_option',
	'type'    	=> 'select',
) );

$wp_customize->add_setting( 'featured_slide_transition_effect', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_effect'],
	'sanitize_callback'	=> 'fabulous_fluid_sanitize_select',
) );

$fabulous_fluid_featured_slide_transition_effects = fabulous_fluid_featured_slide_transition_effects();
$choices = array();
foreach ( $fabulous_fluid_featured_slide_transition_effects as $fabulous_fluid_featured_slide_transition_effect ) {
	$choices[$fabulous_fluid_featured_slide_transition_effect['value']] = $fabulous_fluid_featured_slide_transition_effect['label'];
}

$wp_customize->add_control( 'featured_slide_transition_effect' , array(
	'active_callback'	=> 'fabulous_fluid_is_slider_active',
	'choices'  	=> $choices,
	'label'		=> esc_html__( 'Transition Effect', 'fabulous-fluid' ),
	'priority'	=> '2',
	'section'  	=> 'fabulous_fluid_featured_slider',
	'settings' 	=> 'featured_slide_transition_effect',
	'type'	  	=> 'select',
	)
);

$wp_customize->add_setting( 'featured_slide_transition_delay', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_delay'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'featured_slide_transition_delay' , array(
	'active_callback'	=> 'fabulous_fluid_is_slider_active',
	'description'	=> esc_html__( 'seconds(s)', 'fabulous-fluid' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> esc_html__( 'Transition Delay', 'fabulous-fluid' ),
	'priority'		=> '2.1.1',
	'section'  		=> 'fabulous_fluid_featured_slider',
	'settings' 		=> 'featured_slide_transition_delay',
	)
);

$wp_customize->add_setting( 'featured_slide_transition_length', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_length'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'featured_slide_transition_length' , array(
	'active_callback'	=> 'fabulous_fluid_is_slider_active',
	'description'	=> esc_html__( 'seconds(s)', 'fabulous-fluid' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> esc_html__( 'Transition Length', 'fabulous-fluid' ),
	'priority'		=> '2.1.2',
	'section'  		=> 'fabulous_fluid_featured_slider',
	'settings' 		=> 'featured_slide_transition_length',
	)
);

$wp_customize->add_setting( 'featured_slider_image_loader', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_image_loader'],
	'sanitize_callback'	=> 'sanitize_key',
) );

$featured_slider_image_loaders = fabulous_fluid_featured_slider_image_loaders();
$choices = array();
foreach ( $featured_slider_image_loaders as $featured_slider_image_loader ) {
	$choices[$featured_slider_image_loader['value']] = $featured_slider_image_loader['label'];
}

$wp_customize->add_control( 'featured_slider_image_loader', array(
	'active_callback' => 'fabulous_fluid_is_slider_active',
	'description'     => esc_html__( 'True: Fixes the height overlap issue. Slideshow will start as soon as two slider are available. Slide may display in random, as image is fetch.<br>Wait: Fixes the height overlap issue. Slide display in sequence. Slideshow will start only after all images are available.', 'fabulous-fluid' ),
	'choices'         => $choices,
	'label'           => esc_html__( 'Image Loader', 'fabulous-fluid' ),
	'priority'        => '2.1.3',
	'section'         => 'fabulous_fluid_featured_slider',
	'settings'        => 'featured_slider_image_loader',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'featured_slider_type', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_type'],
	'sanitize_callback'	=> 'sanitize_key',
) );

$featured_slider_types = fabulous_fluid_featured_slider_types();
$choices = array();
foreach ( $featured_slider_types as $featured_slider_type ) {
	$choices[$featured_slider_type['value']] = $featured_slider_type['label'];
}

$wp_customize->add_control( 'featured_slider_type', array(
	'active_callback'	=> 'fabulous_fluid_is_slider_active',
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Select Slider Type', 'fabulous-fluid' ),
	'priority'	=> '2.1.3',
	'section'  	=> 'fabulous_fluid_featured_slider',
	'settings' 	=> 'featured_slider_type',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'featured_slide_number', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_number'],
	'sanitize_callback'	=> 'fabulous_fluid_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_slide_number' , array(
	'active_callback'	=> 'fabulous_fluid_is_demo_slider_inactive',
	'description'	=> esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'fabulous-fluid' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 10,
        'step'  => 1,
    	),
	'label'    		=> esc_html__( 'No of Slides', 'fabulous-fluid' ),
	'priority'		=> '2.1.4',
	'section'  		=> 'fabulous_fluid_featured_slider',
	'settings' 		=> 'featured_slide_number',
	'type'	   		=> 'number',
	)
);

$priority	=	'11';

//Get featured slides humber from theme options
$featured_slide_number	= apply_filters( 'fabulous_fluid_get_option', 'featured_slide_number' );

//loop for featured post sliders
for ( $i=1; $i <=  $featured_slide_number ; $i++ ) {
	$wp_customize->add_setting( 'featured_slider_page_'. $i, array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'fabulous_fluid_sanitize_page',
	) );

	$wp_customize->add_control( 'featured_slider_page_'. $i .'', array(
		'active_callback'	=> 'fabulous_fluid_is_page_slider_active',
		'label'    	=> esc_html__( 'Featured Page', 'fabulous-fluid' ) . ' # ' . $i ,
		'priority'	=> '4' . $i,
		'section'  	=> 'fabulous_fluid_featured_slider',
		'settings' 	=> 'featured_slider_page_'. $i,
		'type'	   	=> 'dropdown-pages',
	) );
}
// Featured Slider End
