<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header(); ?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
<?php
	get_template_part( 'template-parts/tabs'); 
?>

<div class="row small-up-2 medium-up-3 large-up-3 postbox">
	<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>
			
			<?php if( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
				the_posts_navigation(); 
				} 
				else {
					profile_paging_nav();
				}
				?>
			</div><!-- #row -->
	</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>