<?php
/**
 * The template for Managing Theme Structure
 *
 * @package Catch Themes
 * @subpackage Fabulous Fluid
 * @since Fabulous Fluid 0.2
 */

if ( ! function_exists( 'fabulous_fluid_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'fabulous_fluid_doctype', 'fabulous_fluid_doctype', 10 );


if ( ! function_exists( 'fabulous_fluid_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php
	}
endif;
add_action( 'fabulous_fluid_before_wp_head', 'fabulous_fluid_head', 10 );


if ( ! function_exists( 'fabulous_fluid_page_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_page_start() {
		?>
		<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fabulous-fluid' ); ?></a>
		<?php
	}
endif;
add_action( 'fabulous_fluid_before_header', 'fabulous_fluid_page_start', 10 );


if ( ! function_exists( 'fabulous_fluid_header_start' ) ) :
	/**
	 * Start Header id #masthead
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_header_start() {
		?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_header_start', 10 );


if ( ! function_exists( 'fabulous_fluid_site_branding_start' ) ) :
	/**
	 * Start in header class .site-branding
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_site_branding_start() {
		?>
		<div class="site-branding">
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_site_branding_start', 20 );


if ( ! function_exists( 'fabulous_fluid_logo' ) ) :
	/**
	 * Get logo output and display
	 *
	 * @get logo output
	 * @since Fabulous Fluid 0.1
	 *
	 */
	function fabulous_fluid_logo() {
		echo fabulous_fluid_get_logo();
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_logo', 30 );


if ( ! function_exists( 'fabulous_fluid_header_site_details_start' ) ) :
	/**
	 * Start class .site-details enclosing site title and tagline
	 *
	 * @since Fabulous Fluid 0.1
	 *
	 */
	function fabulous_fluid_header_site_details_start() {
		?>
		<div class="header-site-details">
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_header_site_details_start', 40 );


if ( ! function_exists( 'fabulous_fluid_site_title' ) ) :
	/**
	 * Display Site Title
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_site_title() {
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_site_title', 50 );


if ( ! function_exists( 'fabulous_fluid_site_description' ) ) :
	/**
	 * Display Site Description
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_site_description() {
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
		endif;
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_site_description', 60 );


if ( ! function_exists( 'fabulous_fluid_header_site_details_end' ) ) :
	/**
	 * Start class .site-details enclosing site title and tagline
	 *
	 * @since Fabulous Fluid 0.1
	 *
	 */
	function fabulous_fluid_header_site_details_end() {
		?>
		</div><!-- .site-details -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_header_site_details_end', 70 );


if ( ! function_exists( 'fabulous_fluid_site_branding_end' ) ) :
	/**
	 * End in header class .site-branding
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_site_branding_end() {
		?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_site_branding_end', 80 );


if ( ! function_exists( 'fabulous_fluid_mobile_header_menu' ) ) :
	/**
	 * Start after class .site-banner before primary menu
	 *
	 * @since Fabulous Fluid Pro 1.0
	 *
	 */
	function fabulous_fluid_mobile_header_menu() {
		?>
		<div id="mobile-header">
		    <a id="responsive-menu-button" href="#sidr-main"><span class="mobile-menu-text screen-reader-text"><?php esc_html_e( 'Menu', 'fabulous-fluid' ); ?></span></a>
		</div>
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_mobile_header_menu', 90 );


if ( ! function_exists( 'fabulous_fluid_primary_menu' ) ) :
	/**
	 * Start in header primary menu
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_primary_menu() {
		$fabulous_fluid_primary_menu_disable = apply_filters( 'fabulous_fluid_get_option', 'primary_menu_disable' );

		if ( !$fabulous_fluid_primary_menu_disable ) { ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
	                if ( has_nav_menu( 'primary' ) ) {
	                    $fabulous_fluid_primary_menu_args = array(
	                        'theme_location'    => 'primary',
	                        'menu_id' 			=> 'primary-menu',
	                    );
	                    wp_nav_menu( $fabulous_fluid_primary_menu_args );
	                }
	                else {
	                    wp_page_menu( array( 'menu_class'  => 'menu page-menu-wrap' ) );
	                }
				?>
			</nav><!-- #site-navigation -->
	    <?php
		}
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_primary_menu', 100 );


if ( ! function_exists( 'fabulous_fluid_header_social' ) ) :
	/**
	 * Display Social Menu In header
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_header_social() {
		if ( has_nav_menu( 'social' ) ) {
			wp_nav_menu(
	        		array(
						'theme_location' => 'social',
						'menu_class'     => 'social-networks',
						'container'      => false,
						'depth'          => '1',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>'
			    	)
			    );
		}
		else {
			echo '
				<ul class="social-networks">
					<li><a href="javascript:void(0);" class="fa fa-search" id="social-search-anchor"></a></li>
				</ul>
			';
		}
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_header_social', 110 );


if ( ! function_exists( 'fabulous_fluid_header_end' ) ) :
	/**
	 * End header after class .site-banner and class .wrapper
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_header_end', 200 );


if ( ! function_exists( 'fabulous_fluid_promotion_headline' ) ) :
	/**
	 * Template for Promotion Headline
	 *
	 * To override this in a child theme
	 * simply create your own fabulous_fluid_promotion_headline(), and that function will be used instead.
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_promotion_headline() {
		global $post, $wp_query;
	   	$enable_promotion = apply_filters( 'fabulous_fluid_get_option', 'promotion_headline_option' );

		// Front page displays in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		 if ( 'entire-site' == $enable_promotion || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' ==  $enable_promotion  ) ) {
			echo '
				<div id="promotion-message">
					<div class="wrapper clear">';
					$fabulous_fluid_promotion_headline 	= apply_filters( 'fabulous_fluid_get_option', 'promotion_headline' );
					$fabulous_fluid_promotion_subheadline 	= apply_filters( 'fabulous_fluid_get_option', 'promotion_subheadline' );

					echo '
					<div class="section left">';

					if ( "" != $fabulous_fluid_promotion_headline ) {
						echo '<h2 class="promotion-headline">' . $fabulous_fluid_promotion_headline . '</h2>';
					}

					if ( "" != $fabulous_fluid_promotion_subheadline ) {
						echo '<p>' . $fabulous_fluid_promotion_subheadline . '</p>';
					}

					echo '
					</div><!-- .section.left -->';

					$fabulous_fluid_promotion_headline_button 	= apply_filters( 'fabulous_fluid_get_option', 'promotion_headline_button' );
					$fabulous_fluid_promotion_headline_target 	= apply_filters( 'fabulous_fluid_get_option', 'promotion_headline_target' );

					//support qTranslate plugin
					if ( function_exists( 'qtrans_convertURL' ) ) {
						$fabulous_fluid_promotion_headline_url = qtrans_convertURL( apply_filters( 'fabulous_fluid_get_option', 'promotion_headline_url' ) );
					}
					else {
						$fabulous_fluid_promotion_headline_url 	= apply_filters( 'fabulous_fluid_get_option', 'promotion_headline_url' );
					}

					if ( "" != $fabulous_fluid_promotion_headline_url ) {
						if ( "1" == $fabulous_fluid_promotion_headline_target ) {
							$fabulous_fluid_headlinetarget = '_blank';
						}
						else {
							$fabulous_fluid_headlinetarget = '_self';
						}

						echo '
						<div class="section right">
							<a class="promotion-button" href="' . esc_url( $fabulous_fluid_promotion_headline_url ) . '" target="' . esc_attr( $fabulous_fluid_headlinetarget ) . '">' . esc_attr( $fabulous_fluid_promotion_headline_button ) . '
							</a>
						</div><!-- .section.right -->';
					}

			 	echo '
					</div><!-- .wrapper -->
				</div><!-- #promotion-message -->';
		}
	} // fabulous_fluid_promotion_featured_content
endif;
add_action( 'fabulous_fluid_header', 'fabulous_fluid_promotion_headline', 210 );


if ( ! function_exists( 'fabulous_fluid_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_content_start() {
		?>
		<div id="content" class="site-content">
	<?php
	}
endif;
add_action('fabulous_fluid_content', 'fabulous_fluid_content_start', 10 );


if ( ! function_exists( 'fabulous_fluid_content_wrapper_start' ) ) :
	/**
	 * Start div class .container
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_content_wrapper_start() {
		?>
		<div id="content-wrapper" class="wrapper">
		<?php
	}
endif;
add_action('fabulous_fluid_content', 'fabulous_fluid_content_wrapper_start', 20 );


if ( ! function_exists( 'fabulous_fluid_primary_start' ) ) :
	/**
	 * Start div id #primary and class .content-area
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_primary_start() {
		?>
		<div id="primary" class="content-area">
		<?php
	}
endif;
add_action('fabulous_fluid_content', 'fabulous_fluid_primary_start', 30 );


if ( ! function_exists( 'fabulous_fluid_main_start' ) ) :
	/**
	 * Start main id #main and class .site-main
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_main_start() {
		?>
		<main id="main" class="site-main" role="main">
		<?php
	}
endif;
add_action('fabulous_fluid_content', 'fabulous_fluid_main_start', 40 );


if ( ! function_exists( 'fabulous_fluid_main_end' ) ) :
	/**
	 * End div id #main and class .site-main
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_main_end() {
		?>
	    </main><!-- #main -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_after_content', 'fabulous_fluid_main_end', 10 );


if ( ! function_exists( 'fabulous_fluid_primary_end' ) ) :
	/**
	 * End div id #primary and class .content-area
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_primary_end() {
		?>
	    </div><!-- #primary -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_after_content', 'fabulous_fluid_primary_end', 20 );


if ( ! function_exists( 'fabulous_fluid_primary_sidebar' ) ) :
	/**
	 * Display Primary Sidebar
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_primary_sidebar() {
		get_sidebar();
	}
endif;
add_action( 'fabulous_fluid_after_content', 'fabulous_fluid_primary_sidebar', 30 );


if ( ! function_exists( 'fabulous_fluid_content_wrapper_end' ) ) :
	/**
	 * End div class .container
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_content_wrapper_end() {
		?>
	    </div><!-- #content-wrapper -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_after_content', 'fabulous_fluid_content_wrapper_end', 40 );


if ( ! function_exists( 'fabulous_fluid_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_content_end() {
		?>
	    </div><!-- #content -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_after_content', 'fabulous_fluid_content_end', 50 );

if ( ! function_exists( 'fabulous_fluid_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action('fabulous_fluid_footer', 'fabulous_fluid_footer_content_start', 20 );


if ( ! function_exists( 'fabulous_fluid_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_footer_sidebar() {
	// footer-t
	get_sidebar( 'footer' );
}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_sidebar', 30 );


if ( ! function_exists( 'fabulous_fluid_footer_copyright_start' ) ) :
/**
 * Footer Menu and Copyright Start
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_footer_copyright_start() {
	?>
	<div id="site-details" class="footer-b">
		<div class="wrapper">
	<?php
}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_copyright_start', 40 );


if ( ! function_exists( 'fabulous_fluid_footer_menu' ) ) :
	/**
	 * Hook Footer Menu
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_footer_menu() {
		if ( has_nav_menu( 'footer' ) && !apply_filters( 'fabulous_fluid_get_option', 'footer_mobile_menu_disable' ) ) :
		    echo '<nav class="footer-nav">';
		        $args = array(
					'theme_location' => 'footer',
					'container'      => false,
					'depth'          => '1',
		        );
		        wp_nav_menu( $args );
		    echo '</nav><!-- #footer-nav -->';
		endif;
	}
endif; // fabulous_fluid_footer_menu
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_menu', 50 );


if ( ! function_exists( 'fabulous_fluid_footer_content' ) ) :
	/**
	 * Display footer
	 *
	 * @since Fabulous Fluid 0.2
	 */
	function fabulous_fluid_footer_content() {
		//fabulous_fluid_flush_transients();
		$footer_social_menu = '';

		$footer_content     = '';

		if( has_nav_menu( 'social_footer' ) ) {
			/**
			* Displays a navigation menu
			* @param array $args Arguments
			*/
			$args = array(
				'theme_location' => 'social_footer',
				'container'      => false,
				'menu_class'     => 'social-networks',
				'echo'			 => false,
				'depth'          => '1',
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>'

			);

			$footer_social_menu = wp_nav_menu( $args );
		}

		if ( ( !$footer_content = get_transient( 'fabulous_fluid_footer_content' ) ) ) {
			echo '<!-- refreshing cache -->';

			$footer_content = '
				<span class="copyright">' . sprintf(
							_x( 'Copyright &copy; %1$s %2$s' ,
								'1: Year, 2: Site Title with home URL',
								'fabulous-fluid'
							),
							date( 'Y' ),
							'<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>'
						 ) . '</span><span class="sep">&#8226;</span><span class="theme-name">'. esc_attr( 'Fabulous Fluid&nbsp;' ) .
					sprintf(
						_x(
							'by',
							'attribution',
							'fabulous-fluid'
							)
						) . '</span>&nbsp;<span class="theme-author"><a href="' . esc_url( 'https://catchthemes.com/' ) . '" target="_blank">' . esc_attr( 'Catch Themes' ) . '</a></span>';

			set_transient( 'fabulous_fluid_footer_content', $footer_content, 86940 );
	    }

	    if ( '' != $footer_social_menu || '' != $footer_content ) {
			echo '<div class="site-info">' . $footer_social_menu . $footer_content . '</div>';
	    }
	}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_content', 60 );


if ( ! function_exists( 'fabulous_fluid_footer_copyright_end' ) ) :
/**
 * Footer Menu and Copyright End
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_footer_copyright_end() {
	?>
		</div><!-- .wrapper -->
	</div><!-- #site-details.footer-b -->
	<?php
}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_copyright_end', 70 );


if ( ! function_exists( 'fabulous_fluid_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_footer_content_end', 110 );


if ( ! function_exists( 'fabulous_fluid_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Fabulous Fluid 0.2
	 *
	 */
	function fabulous_fluid_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'fabulous_fluid_footer', 'fabulous_fluid_page_end', 200 );


if ( ! function_exists( 'fabulous_fluid_mobile_menus' ) ) :
	/**
	 * This function loads Mobile Menu
	 *
	 * @get the data value from theme options
	 * @uses fabulous_fluid_after action to add the code in the footer
	 */
	function fabulous_fluid_mobile_menus() {
	   	echo '<nav id="sidr-main" class="mobile-menu sidr right" role="navigation">';

		if ( has_nav_menu( 'primary' ) ) {
	    	$args = array(
                'theme_location'    => 'primary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-left-nav" class="menu">%3$s</ul>'
            );

             wp_nav_menu( $args );
        }
        else {
        	wp_page_menu( array( 'menu_class'  => 'menu page-menu-wrap' ) );
        }

		echo '</nav><!-- #sidr-main -->';
	}
	endif; //fabulous_fluid_mobile_menus
add_action( 'fabulous_fluid_after', 'fabulous_fluid_mobile_menus', 30 );