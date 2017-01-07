<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabulous Fluid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * fabulous_fluid_before_entry_container hook
	 *
	 * @hooked fabulous_fluid_content_image - 10
	 */
	do_action( 'fabulous_fluid_before_entry_container' ); ?>

	<div class="entry-container">
		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php fabulous_fluid_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<?php
	    $fabulous_fluid_content_layout 	= apply_filters( 'fabulous_fluid_get_option', 'content_layout' );

			if ( !is_singular() && ( is_archive() || 'full-content' != $fabulous_fluid_content_layout ) ) {
				echo '<div class="entry-summary">';
		        	the_excerpt();
				echo '</div><!-- .entry-summary -->';
			}
			else {
	    		echo '<div class="entry-content">';

				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fabulous-fluid' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fabulous-fluid' ),
					'after'  => '</div>',
				) );

				echo '</div><!-- .entry-content -->';
			}
		?>

		<footer class="entry-footer">
			<?php fabulous_fluid_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- #post-## -->
