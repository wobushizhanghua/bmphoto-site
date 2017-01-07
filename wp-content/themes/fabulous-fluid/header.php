<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fabulous Fluid
 */

	/**
	 * fabulous_fluid_doctype hook
	 *
	 * @hooked fabulous_fluid_doctype - 10
	 *
	 */
	do_action( 'fabulous_fluid_doctype' );
	?>

<head>
<?php
	/**
	 * fabulous_fluid_before_wp_head hook
	 *
	 * @hooked fabulous_fluid_head - 10
	 *
	 */
	do_action( 'fabulous_fluid_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * fabulous_fluid_before_header hook
	 *
	 * @hooked fabulous_fluid_page_start - 10
	 *
	 */
	do_action( 'fabulous_fluid_before_header' );


	/**
	 * fabulous_fluid_header hook
	 *
	 * @hooked fabulous_fluid_header_start - 10
	 * @hooked fabulous_fluid_site_branding_start - 20
	 * @hooked fabulous_fluid_logo - 30
	 * @hooked fabulous_fluid_site_details_start - 40
	 * @hooked fabulous_fluid_site_title - 50
	 * @hooked fabulous_fluid_site_description - 60
	 * @hooked fabulous_fluid_site_details_end - 70
	 * @hooked fabulous_fluid_site_branding_end - 80
	 * @hooked fabulous_fluid_mobile_header_menu - 90
	 * @hooked fabulous_fluid_primary_menu - 100
	 * @hooked fabulous_fluid_header_social - 110
	 * @hooked fabulous_fluid_header_end - 200
	 * @hooked fabulous_fluid_promotion_headline - 210
	 *
	 */
	do_action( 'fabulous_fluid_header' );


	/**
	 * fabulous_fluid_after_header hook
	 *
	 * @hooked fabulous_fluid_featured_image_display - 15
	 * @hooked fabulous_fluid_featured_slider - 20
	 * @hooked fabulous_fluid_featured_grid_content - 30
	 * @hooked fabulous_fluid_featured_content_display - 50
	 * @hooked fabulous_fluid_add_breadcrumb - 60
	 */
	do_action( 'fabulous_fluid_after_header' );

	/**
	 * fabulous_fluid_content hook
	 *
	 * @hooked fabulous_fluid_content_start - 10
	 * @hooked fabulous_fluid_container_start - 20
	 * @hooked fabulous_fluid_primary_start - 30
	 * @hooked fabulous_fluid_main_start - 40
	 *
	 */
	do_action( 'fabulous_fluid_content' );
