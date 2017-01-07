<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

/**
 * fabulous_fluid_before_secondary hook
 */
do_action( 'fabulous_fluid_before_secondary' );

$fabulous_fluid_layout = fabulous_fluid_get_theme_layout();

if ( 'no-sidebar' == $fabulous_fluid_layout ) {
	return;
}

do_action( 'fabulous_fluid_before_primary_sidebar' );
?>
	<div role="complementary" class="widget-area" id="secondary">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
        	dynamic_sidebar( 'sidebar-1' );
   		}
		else {
		//Helper Text
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section id="widget-default-text" class="widget widget_text">
				<div class="widget-wrap">
                	<h4 class="widget-title"><?php _e( 'Primary Sidebar Widget Area', 'fabulous-fluid' ); ?></h4>

           			<div class="textwidget">
                   		<p><?php _e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'fabulous-fluid' ); ?></p>
                   		<p><?php printf( wp_kses( __( 'By default it will load Search and Archives widgets as shown below. You can add widget to this area by visiting your <a href="%1$s">Widgets Panel</a> which will replace default widgets.', 'fabulous-fluid' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'widgets.php' ) ) ); ?></p>
                 	</div>
           		</div><!-- .widget-wrap -->
       		</section><!-- #widget-default-text -->
		<?php
		} ?>
		<section class="widget widget_search" id="default-search">
			<div class="widget-wrap">
				<?php get_search_form(); ?>
			</div><!-- .widget-wrap -->
		</section><!-- #default-search -->
		<section class="widget widget_archive" id="default-archives">
			<div class="widget-wrap">
				<h4 class="widget-title"><?php _e( 'Archives', 'fabulous-fluid' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</div><!-- .widget-wrap -->
		</section><!-- #default-archives -->
		<?php
	} ?>
	</div><!-- .widget-area -->
<?php
/**
 * fabulous_fluid_after_primary_sidebar hook
 */
do_action( 'fabulous_fluid_after_primary_sidebar' );

/**
 * fabulous_fluid_after_secondary hook
 *
 */
do_action( 'fabulous_fluid_after_secondary' );

