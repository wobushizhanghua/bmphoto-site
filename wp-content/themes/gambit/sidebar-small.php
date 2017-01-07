<?php
/**
 * The sidebar containing the small sidebar widget area.
 *
 * @package Gambit
 */

?>
	<section id="secondary" class="small-sidebar widget-area clearfix" role="complementary">

		<?php // Check if Sidebar has widgets.
		if ( is_active_sidebar( 'sidebar-small' ) ) :

			dynamic_sidebar( 'sidebar-small' );

			// Show hint where to add widgets.
		else : ?>

			<aside class="widget clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Small Sidebar', 'gambit' ); ?></h3></div>
				<div class="textwidget">
					<p><?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add some widgets to your sidebar.', 'gambit' ); ?></p>
				</div>
			</aside>

	<?php endif; ?>

	</section><!-- #secondary -->
