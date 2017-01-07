<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabulous Fluid
 */

get_header();

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'page' );

	/**
	 * fabulous_fluid_comment_section hook
	 *
	 * @hooked fabulous_fluid_get_comment_section - 10
	 *
	 */
	do_action( 'fabulous_fluid_comment_section' );

endwhile; // End of the loop.

get_footer();
