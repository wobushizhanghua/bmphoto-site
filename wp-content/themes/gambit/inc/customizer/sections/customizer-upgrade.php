<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Gambit
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function gambit_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'gambit_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'gambit' ),
		'priority' => 70,
		'panel' => 'gambit_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'gambit_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Gambit_Customize_Upgrade_Control(
		$wp_customize, 'gambit_theme_options[upgrade]', array(
		'section' => 'gambit_section_upgrade',
		'settings' => 'gambit_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'gambit_customize_register_upgrade_settings' );
