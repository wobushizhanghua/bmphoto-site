<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tortuga
 */

get_header();

// Get Theme Options from Database.
$theme_options = tortuga_theme_options();

// Display Slider.
if ( true === $theme_options['slider_blog'] ) :

	get_template_part( 'template-parts/post-slider' );

endif;
?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php // Display Homepage Title.
			if ( '' !== $theme_options['blog_title'] ) : ?>

				<header class="page-header clearfix">

					<h1 class="page-title"><?php echo wp_kses_post( $theme_options['blog_title'] ); ?></h1>
					<p class="homepage-description"><?php echo wp_kses_post( $theme_options['blog_description'] ); ?></p>

				</header>

			<?php endif;

			if ( have_posts() ) : ?>

				<div id="post-wrapper" class="post-wrapper clearfix">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content' );

					endwhile; ?>

				</div>

				<?php tortuga_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php // Do not display Sidebar on Three Column Post Layout.
	if ( 'three-columns' !== $theme_options['post_layout'] ) :

		get_sidebar();

	endif; ?>

<?php get_footer(); ?>
