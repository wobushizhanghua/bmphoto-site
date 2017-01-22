<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package executive
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-credits">
			<div class="site-info">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => 'false', 'depth' => 1 ) ); ?>

				<div class="copyright">
	aaaa			</div>
			</div><!-- .site-info -->
		</div><!-- .site-credits -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
