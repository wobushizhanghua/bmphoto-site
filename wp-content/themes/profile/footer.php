<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Profile
 */

?>

	</div><!-- #content -->
	</div><!-- #content -->
<div id="footer-widget" class="row">
<div class="large-3 columns">
	<?php dynamic_sidebar( 'footer-1' ); ?></div>
<div class="large-3 columns">
	<?php dynamic_sidebar( 'footer-2' ); ?></div>
<div class="large-3 columns">
	<?php dynamic_sidebar( 'footer-3' ); ?></div> 
<div class="large-3 columns">
	<?php dynamic_sidebar( 'footer-4' ); ?></div>
</div>
</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="small-12 medium-6 large-6 columns">
		<div class="site-info">
			<?php _e('Theme: ','profile'); ?><a href="<?php echo esc_url( __( 'http://www.insertcart.com/product/profile-pro-wordpress-theme/', 'profile' ) ); ?>"><?php printf( esc_html__( '%s', 'profile' ), 'profile' ); ?></a>
			<span class="sep"> | </span>
			<?php echo ( esc_attr(get_theme_mod('profile_footer_text') == '' )) ? ('&copy; '.date_i18n('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','profile')) : esc_attr(get_theme_mod('profile_footer_text')); ?>
		</div><!-- .site-info -->
		</div>
		<div class="small-12 medium-6 large-6 columns social">
		<?php
		/*
		** Template to Render Social Icons on Top Bar
		*/
			for ($i = 1; $i < 8; $i++) : 
			$social = get_theme_mod('profile_social_'.$i);
			if ( ($social != 'none') && ($social != '') ) : ?>
			<a class="hvr-ripple-out" href="<?php echo esc_url( get_theme_mod('profile_social_url'.$i) ); ?>"><i class="fa fa-<?php echo $social; ?>"></i></a>
			<?php endif;

		endfor; ?>
		</div>
	</footer><!-- #colophon -->
	
	
</div><!-- #mainside -->
</div><!-- #page -->
<?php wp_footer(); ?>
</div></div>
</body>
</html>