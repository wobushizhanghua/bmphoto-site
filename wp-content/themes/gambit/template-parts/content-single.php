<?php
/**
 * The template for displaying single posts
 *
 * @package Gambit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php gambit_post_image_single(); ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php gambit_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gambit' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php gambit_entry_tags(); ?>
		<?php gambit_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>
