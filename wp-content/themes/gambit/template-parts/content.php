<?php
/**
 * The template for displaying articles in the loop with full content
 *
 * @package Gambit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php gambit_post_image(); ?>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php gambit_entry_meta(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php gambit_post_content(); ?>

	</div><!-- .entry-content -->

</article>
