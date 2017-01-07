<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Gambit
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gambit_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'gambit_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'gambit' ),
		'priority' => 30,
		'panel' => 'gambit_options_panel',
		)
	);

	// Add Post Layout Settings for archive posts.
	$wp_customize->add_setting( 'gambit_theme_options[post_layout]', array(
		'default'           => 'small-image',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'gambit_sanitize_select',
		)
	);
	$wp_customize->add_control( 'gambit_theme_options[post_layout]', array(
		'label'    => esc_html__( 'Post Layout (archive pages)', 'gambit' ),
		'section'  => 'gambit_section_post',
		'settings' => 'gambit_theme_options[post_layout]',
		'type'     => 'select',
		'priority' => 1,
		'choices'  => array(
			'small-image' => esc_html__( 'Show featured image beside content', 'gambit' ),
			'index' => esc_html__( 'Show featured image below title', 'gambit' ),
			),
		)
	);

	// Add Settings and Controls for post content.
	$wp_customize->add_setting( 'gambit_theme_options[post_content]', array(
		'default'           => 'excerpt',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'gambit_sanitize_select',
		)
	);
	$wp_customize->add_control( 'gambit_theme_options[post_content]', array(
		'label'    => esc_html__( 'Post Length (archive pages)', 'gambit' ),
		'section'  => 'gambit_section_post',
		'settings' => 'gambit_theme_options[post_content]',
		'type'     => 'radio',
		'priority' => 2,
		'choices'  => array(
			'full' => esc_html__( 'Show full posts', 'gambit' ),
			'excerpt' => esc_html__( 'Show post excerpts', 'gambit' ),
			),
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'gambit_theme_options[excerpt_length]', array(
		'default'           => 25,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'gambit_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'gambit' ),
		'section'  => 'gambit_section_post',
		'settings' => 'gambit_theme_options[excerpt_length]',
		'type'     => 'text',
		'active_callback' => 'gambit_control_post_content_callback',
		'priority' => 3,
		)
	);

}
add_action( 'customize_register', 'gambit_customize_register_post_settings' );
