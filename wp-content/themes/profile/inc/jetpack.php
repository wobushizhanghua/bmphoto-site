<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Profile
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function profile_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'profile_infinite_scroll_render',
		'footer'    => 'page',
		'wrapper'	=> false,
		'posts_per_page' => get_option('posts_per_page'),
		
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
} // end function profile_jetpack_setup
add_action( 'after_setup_theme', 'profile_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function profile_infinite_scroll_render() {
	echo '<div class="row small-up-2 medium-up-3 large-up-3 postbox">';
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
	echo '</div>';
} // end function profile_infinite_scroll_render

function profile_theme_jetpack_infinite_scroll_supported() {
	return current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() || is_search() ) && ! is_post_type_archive( 'product' );
}
add_filter( 'infinite_scroll_archive_supported', 'profile_theme_jetpack_infinite_scroll_supported' );