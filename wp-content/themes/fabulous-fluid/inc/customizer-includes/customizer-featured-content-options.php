<?php
/**
 * The template for adding Featured Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */
// Featured Content Options
$wp_customize->add_section( 'fabulous_fluid_featured_content', array(
	'priority'		=> 500,
	'title'			=> esc_html__( 'Featured Content', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'featured_content_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_option'],
	'sanitize_callback' => 'sanitize_key',
) );

$fabulous_fluid_featured_slider_content_options = fabulous_fluid_featured_slider_options();
$choices = array();
foreach ( $fabulous_fluid_featured_slider_content_options as $fabulous_fluid_featured_slider_content_option ) {
	$choices[$fabulous_fluid_featured_slider_content_option['value']] = $fabulous_fluid_featured_slider_content_option['label'];
}

$wp_customize->add_control( 'featured_content_option', array(
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Enable Featured Content on', 'fabulous-fluid' ),
	'priority'	=> '1',
	'section'  	=> 'fabulous_fluid_featured_content',
	'settings' 	=> 'featured_content_option',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'featured_content_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_layout'],
	'sanitize_callback' => 'sanitize_key',
) );

$fabulous_fluid_featured_content_layout_options = fabulous_fluid_featured_content_layout_options();
$choices = array();
foreach ( $fabulous_fluid_featured_content_layout_options as $fabulous_fluid_featured_content_layout_option ) {
	$choices[$fabulous_fluid_featured_content_layout_option['value']] = $fabulous_fluid_featured_content_layout_option['label'];
}

$wp_customize->add_control( 'featured_content_layout', array(
	'active_callback'	=> 'fabulous_fluid_is_featured_content_active',
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Select Featured Content Layout', 'fabulous-fluid' ),
	'priority'	=> '2',
	'section'  	=> 'fabulous_fluid_featured_content',
	'settings' 	=> 'featured_content_layout',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'featured_content_position', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_position'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox'
) );

$wp_customize->add_control( 'featured_content_position', array(
	'active_callback'	=> 'fabulous_fluid_is_featured_content_active',
	'label'		=> esc_html__( 'Check to Move above Footer', 'fabulous-fluid' ),
	'priority'	=> '3',
	'section'  	=> 'fabulous_fluid_featured_content',
	'settings'	=> 'featured_content_position',
	'type'		=> 'checkbox',
) );

$wp_customize->add_setting( 'featured_content_type', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_type'],
	'sanitize_callback'	=> 'sanitize_key',
) );

$fabulous_fluid_featured_content_types = fabulous_fluid_featured_content_types();
$choices = array();
foreach ( $fabulous_fluid_featured_content_types as $fabulous_fluid_featured_content_type ) {
	$choices[$fabulous_fluid_featured_content_type['value']] = $fabulous_fluid_featured_content_type['label'];
}

$wp_customize->add_control( 'featured_content_type', array(
	'active_callback'	=> 'fabulous_fluid_is_featured_content_active',
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Select Content Type', 'fabulous-fluid' ),
	'priority'	=> '3',
	'section'  	=> 'fabulous_fluid_featured_content',
	'settings' 	=> 'featured_content_type',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'featured_content_headline', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_headline'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'featured_content_headline' , array(
	'active_callback'	=> 'fabulous_fluid_is_featured_content_active',
	'description'	=> esc_html__( 'Leave field empty if you want to remove Headline', 'fabulous-fluid' ),
	'label'    		=> esc_html__( 'Headline for Featured Content', 'fabulous-fluid' ),
	'priority'		=> '4',
	'section'  		=> 'fabulous_fluid_featured_content',
	'settings' 		=> 'featured_content_headline',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'featured_content_subheadline', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_subheadline'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'featured_content_subheadline' , array(
	'active_callback'	=> 'fabulous_fluid_is_featured_content_active',
	'description'	=> esc_html__( 'Leave field empty if you want to remove Sub-headline', 'fabulous-fluid' ),
	'label'    		=> esc_html__( 'Sub-headline for Featured Content', 'fabulous-fluid' ),
	'priority'		=> '5',
	'section'  		=> 'fabulous_fluid_featured_content',
	'settings' 		=> 'featured_content_subheadline',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'featured_content_number', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_number'],
	'sanitize_callback'	=> 'fabulous_fluid_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_content_number' , array(
	'active_callback'	=> 'fabulous_fluid_is_demo_featured_content_inactive',
	'description'	=> esc_html__( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'fabulous-fluid' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
    	),
	'label'    		=> esc_html__( 'No of Featured Content', 'fabulous-fluid' ),
	'priority'		=> '6',
	'section'  		=> 'fabulous_fluid_featured_content',
	'settings' 		=> 'featured_content_number',
	'type'	   		=> 'number',
	)
);

$wp_customize->add_setting( 'featured_content_show', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_show'],
	'sanitize_callback'	=> 'sanitize_key',
) );

$fabulous_fluid_featured_content_show = fabulous_fluid_featured_content_show();
$choices = array();
foreach ( $fabulous_fluid_featured_content_show as $fabulous_fluid_featured_content_shows ) {
	$choices[$fabulous_fluid_featured_content_shows['value']] = $fabulous_fluid_featured_content_shows['label'];
}

$wp_customize->add_control( 'featured_content_show', array(
	'active_callback'	=> 'fabulous_fluid_is_demo_featured_content_inactive',
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Display Content', 'fabulous-fluid' ),
	'priority'	=> '6.1',
	'section'  	=> 'fabulous_fluid_featured_content',
	'settings' 	=> 'featured_content_show',
	'type'	  	=> 'select',
) );

$priority	=	7;

//Get featured slides humber from theme options
$featured_content_number	= apply_filters( 'fabulous_fluid_get_option', 'featured_content_number' );

//loop for featured post content
for ( $i=1; $i <= $featured_content_number ; $i++ ) {
	$wp_customize->add_setting( 'featured_content_page_'. $i, array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'fabulous_fluid_sanitize_page',
	) );

	$wp_customize->add_control( 'featured_content_page_'. $i, array(
		'active_callback'	=> 'fabulous_fluid_is_featured_page_content_active',
		'label'    	=> esc_html__( 'Featured Page', 'fabulous-fluid' ) . ' ' . $i,
		'priority'	=> '5' . $i,
		'section'  	=> 'fabulous_fluid_featured_content',
		'settings' 	=> 'featured_content_page_'. $i,
		'type'	   	=> 'dropdown-pages',
	) );
}
// Featured Content Setting End
