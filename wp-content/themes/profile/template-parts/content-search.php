<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Profile
 */

?>
<div class="columns">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'profile' ) );
		if ( $categories_list && profile_categorized_blog() ) {
			printf( '<span class="cat-links mains">' . esc_html__( '%1$s', 'profile' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}		
		} 
		?>
<?php if ( has_post_thumbnail() ) : ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
<?php if ( has_post_thumbnail() ) { ?>	<?php the_post_thumbnail('profile_mainfeatured'); } else { ?><img class="attachment-profile_mainfeatured size-profile_mainfeatured wp-post-image" src="<?php echo get_template_directory_uri(); ?>/images/thumb.jpg" />
<?php } ?> 
	</a>

<?php endif; ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
</div>