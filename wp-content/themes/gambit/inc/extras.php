<?php
/**
 * Custom functions that are not template related
 *
 * @package Gambit
 */

if ( ! function_exists( 'gambit_default_menu' ) ) :
	/**
	 * Display default page as navigation if no custom menu was set
	 */
	function gambit_default_menu() {

		echo '<ul id="menu-main-navigation" class="main-navigation-menu menu">' . wp_list_pages( 'title_li=&echo=0' ) . '</ul>';

	}
endif;


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gambit_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = gambit_theme_options();

	// Switch theme width.
	if ( 'wide-layout' == $theme_options['theme_width'] ) {
		$classes[] = 'wide-layout';
	}

	// Switch theme layout.
	if ( 'content-center' == $theme_options['theme_layout'] ) {
		$classes[] = 'content-center';
	} elseif ( 'content-right' == $theme_options['theme_layout'] ) {
		$classes[] = 'content-right';
	}

	return $classes;
}
add_filter( 'body_class', 'gambit_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function gambit_hide_elements() {

	// Get theme options from database.
	$theme_options = gambit_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes = implode( ', ', $elements );
	$custom_css = $classes . ' {
	position: absolute;
	clip: rect(1px, 1px, 1px, 1px);
}';

	// Add Custom CSS.
	wp_add_inline_style( 'gambit-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'gambit_hide_elements', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function gambit_excerpt_length( $length ) {

	// Get theme options from database.
	$theme_options = gambit_theme_options();

	// Return excerpt text.
	if ( isset( $theme_options['excerpt_length'] ) and $theme_options['excerpt_length'] >= 0 ) :
		return absint( $theme_options['excerpt_length'] );
	else :
		return 30; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'gambit_excerpt_length' );


/**
 * Function to change excerpt length for posts in category posts widgets
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function gambit_magazine_posts_excerpt_length( $length ) {
	return 15;
}

/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function gambit_excerpt_more( $more_text ) {

	return '';

}
add_filter( 'excerpt_more', 'gambit_excerpt_more' );

/**
 * Set wrapper start for wooCommerce
 */
function gambit_wrapper_start() {
	echo '<section id="primary" class="content-area">';
	echo '<main id="main" class="site-main" role="main">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'gambit_wrapper_start', 10 );


/**
 * Set wrapper end for wooCommerce
 */
function gambit_wrapper_end() {
	echo '</main><!-- #main -->';
	echo '</section><!-- #primary -->';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'gambit_wrapper_end', 10 );
