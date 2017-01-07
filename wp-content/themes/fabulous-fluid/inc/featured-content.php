<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

if( !function_exists( 'fabulous_fluid_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook fabulous_fluid_before_content.
*
* @since Fabulous Fluid 0.2
*/
function fabulous_fluid_featured_content_display() {
	//fabulous_fluid_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$enable_content = apply_filters( 'fabulous_fluid_get_option', 'featured_content_option');
	$content_select = apply_filters( 'fabulous_fluid_get_option', 'featured_content_type' );

	// Front page displays in Reading Settings
	$page_on_front 	= get_option( 'page_on_front' ) ;
	$page_for_posts = get_option( 'page_for_posts' );


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enable_content || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_content  ) ) {
		if ( ( !$featured_content = get_transient( 'fabulous_fluid_featured_content' ) ) ) {
			$position     = apply_filters( 'fabulous_fluid_get_option', 'featured_content_position' );
			$layouts      = apply_filters( 'fabulous_fluid_get_option', 'featured_content_layout' );
			$headline     = apply_filters( 'fabulous_fluid_get_option', 'featured_content_headline' );
			$sub_headline = apply_filters( 'fabulous_fluid_get_option', 'featured_content_subheadline' );

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if ( 'demo-content' == $content_select  ) {
				$headline 		= __( 'Featured Content', 'fabulous-fluid' );
				$sub_headline 	= __( 'Here you can showcase the x number of Featured Content', 'fabulous-fluid' );
			}

			$classes .= ' ' . $content_select;

			if ( '1' == $position ) {
				$classes .= ' featured-content-bottom' ;
			}

			$featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $sub_headline ) ) {
							$featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$featured_content .='<h2 id="featured-heading" class="entry-title">'. $headline .'</h2>';
								}
								if ( !empty( $sub_headline ) ) {
									$featured_content .='<p>'. $sub_headline .'</p>';
								}
							$featured_content .='</div><!-- .featured-heading-wrap -->';
						}

						$featured_content .='
						<div class="featured-content-wrap clear">';
							// Select content
							if ( 'demo-content' == $content_select  && function_exists( 'fabulous_fluid_demo_content' ) ) {
								$featured_content .= fabulous_fluid_demo_content();
							}
							elseif ( 'page-content' == $content_select  && function_exists( 'fabulous_fluid_page_content' ) ) {
								$featured_content .= fabulous_fluid_page_content();
							}

			$featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
			set_transient( 'fabulous_fluid_featured_content', $featured_content, 86940 );

		}

		echo $featured_content;
	}
}
endif;


if ( ! function_exists( 'fabulous_fluid_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action fabulous_fluid_content, fabulous_fluid_after_secondary
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_featured_content_display_position() {
	// Getting data from Theme Options
	$featured_content_position = apply_filters( 'fabulous_fluid_get_option', 'featured_content_position' );

	if ( '1' != $featured_content_position ) {
		add_action( 'fabulous_fluid_after_header', 'fabulous_fluid_featured_content_display', 50 );
	} else {
		add_action( 'fabulous_fluid_footer', 'fabulous_fluid_featured_content_display', 10 );
	}

}
endif; // fabulous_fluid_featured_content_display_position
add_action( 'wp', 'fabulous_fluid_featured_content_display_position' );


if ( ! function_exists( 'fabulous_fluid_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Fabulous Fluid 0.2
 *
 */
function fabulous_fluid_demo_content() {
	$layout = apply_filters( 'fabulous_fluid_get_option', 'featured_content_layout' );
	$output = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a title="' . esc_html__( 'Central Park', 'fabulous-fluid' ) .'" href="#">
					<img alt="' . esc_html__( 'Central Park', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-1.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Central Park', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Central Park', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'Central Park is is the most visited urban park in the United States as well as one of the most filmed locations in the world. It was opened in 1857 and is expanded in 843 acres of city-owned land.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a title="' . esc_html__( 'Home Office', 'fabulous-fluid' ) .'" href="#">
					<img alt="' . esc_html__( 'Home Office', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-2.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Home Office', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Home Office', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'It might be work, but it doesn\'t have to feel like it. All you need is a comfortable desk, nice laptop, home office furniture that keeps things organized, and the right lighting for the job.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a title="' . esc_html__( 'Vespa Scooter', 'fabulous-fluid' ) .'" href="#">
					<img alt="' . esc_html__( 'Vespa Scooter', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-3.jpg" />
				</a>`
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Vespa Scooter', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Vespa Scooter', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'The Vespa Scooter has evolved from a single model motor scooter manufactured by Piaggio & Co. S.p.A. of Pontedera, Italy-to a full line of scooters, today owned by Piaggio.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' . esc_html__( 'Antique Clock', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-4.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Antique Clock', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Antique Clock', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'Antique clocks increase in value with the rarity of the design, their condition, and appeal in the market place. Many different materials were used in antique clocks.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>';

	if( 'layout-five' == $layout || 'layout-six' == $layout ) {
		$output .= '
		<article id="featured-post-5" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' . esc_html__( 'Vintage Bicycle', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-5.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Vintage Bicycle', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Vintage Bicycle', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'Vintage Bicycle. A bicycle, often called a bike or cycle, is a human-powered, pedal-driven, single-track vehicle, having two wheels attached to a frame, one behind the other.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>';
	}

	if( 'layout-six' == $layout ) {
		$output .= '
		<article id="featured-post-6" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="' . esc_html__( 'Fishing Boats', 'fabulous-fluid' ) .'" class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured-6.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="' . esc_html__( 'Fishing Boats', 'fabulous-fluid' ) .'" href="#">' . esc_html__( 'Fishing Boats', 'fabulous-fluid' ) .'</a>
					</h2>
					<div class="meta-info">
						<span class="category"><a href="#">' . esc_html__( 'Adventure', 'fabulous-fluid' ) .'</a></span>
						<span class="posted-on"><a href="#">' . esc_html__( '9 Oct, 2015', 'fabulous-fluid' ) .'</a></span>
					</div>
				</header>
				<div class="entry-summary">
					<p>' . esc_html__( 'A boat is a watercraft of any size designed to float or plane, to work or travel on water. Small boats are typically found on inland (lakes) or in protected coastal areas.', 'fabulous-fluid' ) .' <span class="readmore"><a href="#">' . esc_html__( 'Read More', 'fabulous-fluid' ) .'</a></span></p>
				</div>
			</div><!-- .entry-container -->
		</article>';
	}

	return $output;
}
endif; // fabulous_fluid_demo_content


if ( ! function_exists( 'fabulous_fluid_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_page_content( ) {
	global $post;

	$quantity 	= apply_filters( 'fabulous_fluid_get_option', 'featured_content_number' );

	$output = '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( apply_filters( 'fabulous_fluid_get_option', 'featured_content_page_' . $i ) && apply_filters( 'fabulous_fluid_get_option', 'featured_content_page_' . $i ) > 0 ) {
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( apply_filters( 'fabulous_fluid_get_option', 'featured_content_page_' . $i ) ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$show_content = apply_filters( 'fabulous_fluid_get_option', 'featured_content_show' );

		$i=0;

		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'echo' => false ) );

			$excerpt = get_the_excerpt();

			$output .= '
				<article id="featured-post-' . $i . '" class="post hentry page-content">';
				//Default value if there is no featurd image or first image
				$image = '<img class="no-featured-image" src="'.get_template_directory_uri().'/images/no-featured-image-420x283.jpg" >';

				if ( has_post_thumbnail() ) {
					$image =  get_the_post_thumbnail( $post->ID, 'fabulous-fluid-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );
				}
				else {
					//Get the first image in page, returns false if there is no image
					$first_image = fabulous_fluid_get_first_image( $post->ID, 'fabulous-fluid-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $first_image ) {
						$image = $first_image;
					}
				}

				$output .= '
					<figure class="featured-content-image">
						'. $image .'
					</figure>';

				$output .= '
					<div class="entry-container">
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_html( the_title( '','', false ) ) . '</a>
							</h2>
							<div class="meta-info">
								' .  fabulous_fluid_grid_content_meta() . '
							</div>
						</header>';
						$output .= '<div class="entry-summary excerpt">
							<p>';

						if ( 'excerpt' == $show_content ) {
							$output .= $excerpt;
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$output .= $content;
						}

					$output .= '
							</p>
						</div><!-- .entry-summary -->
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}

	return $output;
}
endif; // fabulous_fluid_page_content
