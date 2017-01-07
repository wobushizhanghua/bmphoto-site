<?php
/**
 * Fabulous Fluid Theme Customizer.
 *
 * @package Fabulous Fluid
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fabulous_fluid_customize_register( $wp_customize ) {
	//Include custom controls
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-custom-controls.php';

	$defaults = fabulous_fluid_get_default_theme_options();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Add Hide Tagline option
	$wp_customize->add_setting( 'hide_tagline', array(
		'default'			=> $defaults['hide_tagline'],
		'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'hide_tagline', array(
		'label'    => esc_html__( 'Check to Hide Site Description/Tagline', 'fabulous-fluid' ),
		'priority' => 50,
		'section'  => 'title_tagline',
		'settings' => 'hide_tagline',
		'type'     => 'checkbox',
	) );

	//Add Tagline Color Option
	$wp_customize->add_setting( 'tagline_color', array(
		'default'           => $defaults['tagline_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tagline_color', array(
		'label'    => esc_html__( 'Tagline Color', 'fabulous-fluid' ),
		'section'  => 'colors',
		'settings' => 'tagline_color',
	) ) );

	//Header Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-header-options.php';

	//Theme Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-theme-options.php';

	//Make headertextcolor change via JS in customizer Preview
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//Featured Slider
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-featured-slider-options.php';

	//Featured Grid Content
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-featured-grid-content-options.php';

	//Featured Content
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-featured-content-options.php';

	// Reset all settings to default
	$wp_customize->add_section( 'fabulous_fluid_reset_all_settings', array(
		'priority' 		=> 700,
		'title'    		=> esc_html__( 'Reset all settings', 'fabulous-fluid' ),
	) );

	$wp_customize->add_setting( 'reset_all_settings', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'fabulous_fluid_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'reset_all_settings', array(
		'label'    => esc_html__( 'Check to reset all settings to default', 'fabulous-fluid' ),
		'section'  => 'fabulous_fluid_reset_all_settings',
		'settings' => 'reset_all_settings',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> esc_html__( 'Important Links', 'fabulous-fluid' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'fabulous_fluid_sanitize_important_link',
	) );

	$wp_customize->add_control( new Fabulous_Fluid_Important_Links( $wp_customize, 'important_links', array(
        'label'   	=> esc_html__( 'Important Links', 'fabulous-fluid' ),
        'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );
    //Important Links End
}
add_action( 'customize_register', 'fabulous_fluid_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fabulous_fluid_customize_preview_js() {
	wp_enqueue_script( 'fabulous_fluid_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20160525', true );

	//Flush transients
	fabulous_fluid_flush_transients();
}
add_action( 'customize_preview_init', 'fabulous_fluid_customize_preview_js' );

/**
 * Function to reset date with respect to condition
 */
function fabulous_fluid_reset_data() {
	$defaults  = fabulous_fluid_get_default_theme_options();
	$reset = apply_filters( 'fabulous_fluid_get_option', 'reset_all_settings' );
    if( $reset ) {
    	remove_theme_mods();

        // Flush out all transients
        fabulous_fluid_flush_transients();

        return;
    }
}
add_action( 'customize_save_after', 'fabulous_fluid_reset_data' );

/**
 * Custom scripts and styles on customize.php
 *
 * @since Fabulous Fluid 1.2
 */
function fabulous_fluid_customize_scripts() {
	wp_enqueue_script( 'fabulous_fluid_customizer_custom', get_template_directory_uri() . '/js/customizer-custom-scripts.min.js', array( 'jquery' ), '20131028', true );

	$fabulous_fulid_data = array(
		'reset_message'        => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'fabulous-fluid' )
	);

	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'fabulous_fluid_customizer_custom', 'fabulous_fulid_data', $fabulous_fulid_data );
}
add_action( 'customize_controls_enqueue_scripts', 'fabulous_fluid_customize_scripts' );

//Active callbacks for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-active-callbacks.php';

//Sanitize functions for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer-sanitize-functions.php';

// Add Upgrade to Pro Button.
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/upgrade-button/class-customize.php';
