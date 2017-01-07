<?php
/**
 * @package executive
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php executive_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php  if ( '' != get_the_post_thumbnail() ) : ?>
			<div class="single-thumbnail-wrapper">
				<?php the_post_thumbnail( 'executive-single-img' ); ?>
			</div><!-- .post-thumbnail-wrapper -->
		<?php endif; ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'executive' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php executive_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
