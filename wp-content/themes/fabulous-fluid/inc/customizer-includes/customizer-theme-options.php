<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

//Theme Options
$wp_customize->add_panel( 'fabulous_fluid_theme_options', array(
    'description'    => esc_html__( 'Basic theme Options', 'fabulous-fluid' ),
    'capability'     => 'edit_theme_options',
    'priority'       => 200,
    'title'    		 => esc_html__( 'Theme Options', 'fabulous-fluid' ),
) );

	// Breadcrumb Option
$wp_customize->add_section( 'fabulous_fluid_breadcrumb_options', array(
	'description'	=> esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'fabulous-fluid' ),
	'panel'			=> 'fabulous_fluid_theme_options',
	'title'    		=> esc_html__( 'Breadcrumb Options', 'fabulous-fluid' ),
	'priority' 		=> 201,
) );

$wp_customize->add_setting( 'breadcrumb_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_option'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox'
) );

$wp_customize->add_control( 'breadcrumb_option', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_breadcrumb_options',
	'settings' => 'breadcrumb_option',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'breadcrumb_onhomepage', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_onhomepage'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox'
) );

$wp_customize->add_control( 'breadcrumb_onhomepage', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb on Homepage', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_breadcrumb_options',
	'settings' => 'breadcrumb_onhomepage',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'breadcrumb_seperator', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_seperator'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'breadcrumb_seperator', array(
	'input_attrs' => array(
    		'style' => 'width: 40px;'
		),
	'label'    	=> esc_html__( 'Seperator between Breadcrumbs', 'fabulous-fluid' ),
	'section' 	=> 'fabulous_fluid_breadcrumb_options',
	'settings' 	=> 'breadcrumb_seperator',
	'type'     	=> 'text'
	)
);
// Breadcrumb Option End

/**
 *  Remove Custom CSS option from WordPress 4.7 onwards
 *  //@remove Remove if block and custom_css when WordPress 5.0 is released
 */
if ( !function_exists( 'wp_update_custom_css_post' ) ) {
	// Custom CSS Option
	$wp_customize->add_section( 'fabulous_fluid_custom_css', array(
		'description'	=> esc_html__( 'Custom/Inline CSS', 'fabulous-fluid'),
		'panel'  		=> 'fabulous_fluid_theme_options',
		'priority' 		=> 203,
		'title'    		=> esc_html__( 'Custom CSS Options', 'fabulous-fluid' ),
	) );

	$wp_customize->add_setting( 'custom_css', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'fabulous_fluid_sanitize_custom_css',
	) );

	$wp_customize->add_control( 'custom_css', array(
			'label'		=> esc_html__( 'Enter Custom CSS', 'fabulous-fluid' ),
	        'priority'	=> 1,
			'section'   => 'fabulous_fluid_custom_css',
	        'settings'  => 'custom_css',
			'type'		=> 'textarea',
	) ) ;
	// Custom CSS End
}

// Excerpt Options
$wp_customize->add_section( 'fabulous_fluid_excerpt_options', array(
	'panel'  	=> 'fabulous_fluid_theme_options',
	'priority' 	=> 204,
	'title'    	=> esc_html__( 'Excerpt Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'excerpt_length', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_length'],
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( 'excerpt_length', array(
	'description' => esc_html__('Excerpt length. Default is 40 words', 'fabulous-fluid'),
	'input_attrs' => array(
        'min'   => 10,
        'max'   => 200,
        'step'  => 5,
        'style' => 'width: 60px;'
        ),
    'label'    => esc_html__( 'Excerpt Length (words)', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_excerpt_options',
	'settings' => 'excerpt_length',
	'type'	   => 'number',
	)
);

$wp_customize->add_setting( 'excerpt_more_text', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_more_text'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'excerpt_more_text', array(
	'label'    => esc_html__( 'Read More Text', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_excerpt_options',
	'settings' => 'excerpt_more_text',
	'type'	   => 'text',
) );
// Excerpt Options End

// Form Elements
$wp_customize->add_section( 'fabulous_fluid_form_elements', array(
	'panel'			=> 'fabulous_fluid_theme_options',
	'priority' 		=> 208,
	'title'    		=> esc_html__( 'Form Elements', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'fabulous_fluid_theme_options[enable_jcf]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['enable_jcf'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
) );

$wp_customize->add_control( 'fabulous_fluid_theme_options[enable_jcf]', array(
	'label'    => __( 'Check to enable JavaScript Custom Forms', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_form_elements',
	'settings' => 'fabulous_fluid_theme_options[enable_jcf]',
	'type'	   => 'checkbox',
) );
// Form Elements End

//Homepage / Frontpage Options
$wp_customize->add_section( 'fabulous_fluid_homepage_options', array(
	'description'	=> esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'fabulous-fluid' ),
	'panel'			=> 'fabulous_fluid_theme_options',
	'priority' 		=> 209,
	'title'   	 	=> esc_html__( 'Homepage / Frontpage Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'front_page_category', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['front_page_category'],
	'sanitize_callback'	=> 'fabulous_fluid_sanitize_category_list',
) );

$wp_customize->add_control( new Fabulous_Fluid_Customize_Dropdown_Categories_Control( $wp_customize, 'front_page_category', array(
    'label'   	=> esc_html__( 'Select Categories', 'fabulous-fluid' ),
    'name'	 	=> 'front_page_category',
	'priority'	=> '6',
    'section'  	=> 'fabulous_fluid_homepage_options',
    'settings' 	=> 'front_page_category',
    'type'     	=> 'dropdown-categories',
) ) );
//Homepage / Frontpage Settings End

// Layout Options
$wp_customize->add_section( 'fabulous_fluid_layout', array(
	'capability'=> 'edit_theme_options',
	'panel'		=> 'fabulous_fluid_theme_options',
	'priority'	=> 211,
	'title'		=> esc_html__( 'Layout Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'theme_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['theme_layout'],
	'sanitize_callback' => 'sanitize_key',
) );

$layouts = fabulous_fluid_layouts();
$choices = array();
foreach ( $layouts as $layout ) {
	$choices[ $layout['value'] ] = $layout['label'];
}

$wp_customize->add_control( 'theme_layout', array(
	'choices'	=> $choices,
	'label'		=> esc_html__( 'Default Layout', 'fabulous-fluid' ),
	'section'	=> 'fabulous_fluid_layout',
	'settings'  => 'theme_layout',
	'type'		=> 'select',
) );

$wp_customize->add_setting( 'content_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['content_layout'],
	'sanitize_callback' => 'sanitize_key',
) );

$layouts = fabulous_fluid_get_archive_content_layout();
$choices = array();
foreach ( $layouts as $layout ) {
	$choices[ $layout['value'] ] = $layout['label'];
}

$wp_customize->add_control( 'content_layout', array(
	'choices'   => $choices,
	'label'		=> esc_html__( 'Archive Content Layout', 'fabulous-fluid' ),
	'section'   => 'fabulous_fluid_layout',
	'settings'  => 'content_layout',
	'type'      => 'select',
) );

$wp_customize->add_setting( 'single_post_image_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['single_post_image_layout'],
	'sanitize_callback' => 'sanitize_key',
) );


$single_post_image_layouts = fabulous_fluid_single_post_image_layout_options();
$choices = array();
foreach ( $single_post_image_layouts as $single_post_image_layout ) {
	$choices[$single_post_image_layout['value']] = $single_post_image_layout['label'];
}

$wp_customize->add_control( 'single_post_image_layout', array(
		'label'		=> esc_html__( 'Single Page/Post Image Layout ', 'fabulous-fluid' ),
		'section'   => 'fabulous_fluid_layout',
        'settings'  => 'single_post_image_layout',
        'type'	  	=> 'select',
		'choices'  	=> $choices,
) );
// Layout Options End

// Pagination Options
$pagination_type	= apply_filters( 'fabulous_fluid_get_option', 'pagination_type' );

$fabulous_fluid_navigation_description = sprintf(
	wp_kses(
		__( '<a target="_blank" href="%s">WP-PageNavi Plugin</a> is recommended for Numeric Option(But will work without it).<br/>Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'fabulous-fluid' ),
		array(
			'a' => array(
				'href' => array(),
				'target' => array(),
			),
			'br'=> array()
		)
	),
	esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ),
	esc_url( 'https://wordpress.org/plugins/jetpack/' )
);

/**
 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
 */
if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
	if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
		$fabulous_fluid_navigation_description = sprintf(
			wp_kses(
				__( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'fabulous-fluid' ),
				array(
					'a' => array(
						'href' => array(),
						'target' => array()
					)
				)
			),
			esc_url( 'https://wordpress.org/plugins/jetpack/' )
		);
	}
	else {
		$fabulous_fluid_navigation_description = '';
	}
}

$wp_customize->add_section( 'fabulous_fluid_pagination_options', array(
	'description'	=> $fabulous_fluid_navigation_description,
	'panel'  		=> 'fabulous_fluid_theme_options',
	'priority'		=> 212,
	'title'    		=> esc_html__( 'Pagination Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'pagination_type', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['pagination_type'],
	'sanitize_callback' => 'sanitize_key',
) );

$pagination_types = fabulous_fluid_get_pagination_types();
$choices = array();
foreach ( $pagination_types as $pagination_type ) {
	$choices[$pagination_type['value']] = $pagination_type['label'];
}

$wp_customize->add_control( 'pagination_type', array(
	'choices'  => $choices,
	'label'    => esc_html__( 'Pagination type', 'fabulous-fluid' ),
	'section'  => 'fabulous_fluid_pagination_options',
	'settings' => 'pagination_type',
	'type'	   => 'select',
) );
// Pagination Options End

//Promotion Headline Options
$wp_customize->add_section( 'fabulous_fluid_promotion_headline_options', array(
	'description'	=> esc_html__( 'To disable the fields, simply leave them empty.', 'fabulous-fluid' ),
	'panel'			=> 'fabulous_fluid_theme_options',
	'priority' 		=> 213,
	'title'   	 	=> esc_html__( 'Promotion Headline Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'promotion_headline_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['promotion_headline_option'],
	'sanitize_callback' => 'sanitize_key',
) );

$featured_slider_content_options = fabulous_fluid_featured_slider_options();
$choices = array();
foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
	$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
}

$wp_customize->add_control( 'promotion_headline_option', array(
	'choices'  	=> $choices,
	'label'    	=> esc_html__( 'Enable Promotion Headline on', 'fabulous-fluid' ),
	'priority'	=> '0.5',
	'section'  	=> 'fabulous_fluid_promotion_headline_options',
	'settings' 	=> 'promotion_headline_option',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'promotion_headline', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline'],
	'sanitize_callback'	=> 'wp_kses_post'
) );

$wp_customize->add_control( 'promotion_headline', array(
	'description'	=> esc_html__( 'Appropriate Words: 10', 'fabulous-fluid' ),
	'label'    		=> esc_html__( 'Promotion Headline Text', 'fabulous-fluid' ),
	'priority'		=> '1',
	'section' 		=> 'fabulous_fluid_promotion_headline_options',
	'settings'		=> 'promotion_headline',
	'type'			=> 'textarea',
) );

$wp_customize->add_setting( 'promotion_subheadline', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_subheadline'],
	'sanitize_callback'	=> 'wp_kses_post'
) );

$wp_customize->add_control( 'promotion_subheadline', array(
	'description'	=> esc_html__( 'Appropriate Words: 15', 'fabulous-fluid' ),
	'label'    		=> esc_html__( 'Promotion Subheadline Text', 'fabulous-fluid' ),
	'priority'		=> '2',
	'section' 		=> 'fabulous_fluid_promotion_headline_options',
	'settings'		=> 'promotion_subheadline',
	'type'			=> 'textarea',
) );

$wp_customize->add_setting( 'promotion_headline_button', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_button'],
	'sanitize_callback'	=> 'sanitize_text_field'
) );

$wp_customize->add_control( 'promotion_headline_button', array(
	'description'	=> esc_html__( 'Appropriate Words: 3', 'fabulous-fluid' ),
	'label'    		=> esc_html__( 'Promotion Headline Button Text ', 'fabulous-fluid' ),
	'priority'		=> '3',
	'section' 		=> 'fabulous_fluid_promotion_headline_options',
	'settings'		=> 'promotion_headline_button',
	'type'			=> 'text',
) );

$wp_customize->add_setting( 'promotion_headline_url', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_url'],
	'sanitize_callback'	=> 'esc_url_raw'
) );

$wp_customize->add_control( 'promotion_headline_url', array(
	'label'    	=> esc_html__( 'Promotion Headline Link', 'fabulous-fluid' ),
	'priority'	=> '4',
	'section' 	=> 'fabulous_fluid_promotion_headline_options',
	'settings'	=> 'promotion_headline_url',
	'type'		=> 'text',
) );

$wp_customize->add_setting( 'promotion_headline_target', array(
	'capability'		=> 'edit_theme_options',
	'default' 			=> $defaults['promotion_headline_target'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
) );

$wp_customize->add_control( 'promotion_headline_target', array(
	'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'fabulous-fluid' ),
	'priority'	=> '5',
	'section'  	=> 'fabulous_fluid_promotion_headline_options',
	'settings' 	=> 'promotion_headline_target',
	'type'     	=> 'checkbox',
) );
// Promotion Headline Options End

// Scrollup
$wp_customize->add_section( 'fabulous_fluid_scrollup', array(
	'panel'    => 'fabulous_fluid_theme_options',
	'priority' => 215,
	'title'    => esc_html__( 'Scrollup Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'disable_scrollup', array(
	'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['disable_scrollup'],
	'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
) );

$wp_customize->add_control( 'disable_scrollup', array(
	'label'		=> esc_html__( 'Check to disable Scroll Up', 'fabulous-fluid' ),
	'section'   => 'fabulous_fluid_scrollup',
    'settings'  => 'disable_scrollup',
	'type'		=> 'checkbox',
) );
// Scrollup End

// Search Options
$wp_customize->add_section( 'fabulous_fluid_search_options', array(
	'description'=> esc_html__( 'Change default placeholder text in Search.', 'fabulous-fluid'),
	'panel'  => 'fabulous_fluid_theme_options',
	'priority' => 216,
	'title'    => esc_html__( 'Search Options', 'fabulous-fluid' ),
) );

$wp_customize->add_setting( 'search_text', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['search_text'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'search_text', array(
	'label'		=> esc_html__( 'Default Display Text in Search', 'fabulous-fluid' ),
	'section'   => 'fabulous_fluid_search_options',
    'settings'  => 'search_text',
	'type'		=> 'text',
) );
// Search Options End
//Theme Option End
