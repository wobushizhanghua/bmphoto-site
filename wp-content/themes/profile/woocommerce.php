<?php
/**
 * The template for displaying woocommerce products.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Profile
 */

get_header(); ?>
	<div class="singlepage">
		<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- #column -->
<?php get_footer(); ?>
