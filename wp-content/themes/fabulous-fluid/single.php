<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fabulous Fluid
 */

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', get_post_format() );

	the_post_navigation();

	/**
	 * fabulous_fluid_comment_section hook
	 *
	 * @hooked fabulous_fluid_get_comment_section - 10
	 *
	 */
	do_action( 'fabulous_fluid_comment_section' );

endwhile; // End of the loop.


get_footer();
