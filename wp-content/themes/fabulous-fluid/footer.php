<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

/**
 * fabulous_fluid_after_content hook
 *
 * @hooked fabulous_fluid_main_end - 10
 * @hooked fabulous_fluid_primary_end - 20
 * @hooked fabulous_fluid_primary_sidebar - 30
 * @hooked fabulous_fluid_container_end - 40
 * @hooked fabulous_fluid_content_end - 50
 *
 */
do_action( 'fabulous_fluid_after_content' );

/**
 * fabulous_fluid_footer hook
 *
 * @hooked fabulous_fluid_featured_content_display ( above footer ) - 10
 * @hooked fabulous_fluid_footer_content_start - 20
 * @hooked fabulous_fluid_footer_sidebar - 30
 * @hooked fabulous_fluid_footer_copyright_start - 40
 * @hooked fabulous_fluid_footer_menu - 50
 * @hooked fabulous_fluid_footer_content - 60
 * @hooked fabulous_fluid_footer_copyright_end - 70
 * @hooked fabulous_fluid_footer_content_end - 110
 * @hooked fabulous_fluid_page_end - 200
 *
 */
do_action( 'fabulous_fluid_footer' );

/**
 * fabulous_fluid_after hook
 *
 * @hooked fabulous_fluid_header_social_search - 10
 * @hooked fabulous_fluid_scrollup - 20
 * @hooked fabulous_fluid_mobile_menus - 30
 *
 */
do_action( 'fabulous_fluid_after' );

wp_footer();

?>

</body>
</html>
