<?php
/**
 * Fabulous Fluid functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fabulous Fluid
 */

if ( ! function_exists( 'fabulous_fluid_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fabulous_fluid_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Fabulous Fluid, use a find and replace
	 * to change 'fabulous-fluid' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fabulous-fluid', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add tyles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', fabulous_fluid_fonts_url() ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// used in Featured Grid Content Small Image/Featured Content (4:3)
	set_post_thumbnail_size( 420, 283, true );

	// Slider Image Size (16:9)
	add_image_size( 'fabulous-fluid-slider', 1680, 720, true );

	// Featured Grid Content Large Image (4:3)
	add_image_size( 'fabulous-fluid-grid-large', 840, 565, true );

	//Custom Widgets Thumbnail Size (1:1)
	add_image_size( 'fabulous-fluid-widget-thumbnail', 67, 67, true ); // used in Custom Widgets 1:1

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'       => esc_html__( 'Primary Menu', 'fabulous-fluid' ),
		'social'        => esc_html__( 'Header Social Menu', 'fabulous-fluid' ),
		'social_footer' => esc_html__( 'Footer Social Menu', 'fabulous-fluid' ),
		'footer'        => esc_html__( 'Footer Menu', 'fabulous-fluid' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	$background_color = fabulous_fluid_get_default_theme_options( 'background_color' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fabulous_fluid_custom_background_args', array(
		'default-color' => $background_color,
		'default-image' => '',
	) ) );

	/**
	* Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	add_theme_support( 'custom-logo' );
}
endif;
add_action( 'after_setup_theme', 'fabulous_fluid_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fabulous_fluid_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fabulous_fluid_content_width', 840 );
}
add_action( 'after_setup_theme', 'fabulous_fluid_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function fabulous_fluid_scripts() {
	//Enqueue Sidr Dark CSS
	wp_enqueue_style( 'sidr-dark', get_template_directory_uri() . '/css/jquery.sidr.dark.min.css', false, '2.1.0' );

	$enable_jcf	= apply_filters( 'fabulous_fluid_get_option', 'enable_jcf' );

	//Add jquery as first dependency for custom script
	$scripts_deps[] = 'jquery';

	if ( $enable_jcf ) {
		//Register JavaScript Custom Forms Script
		wp_register_script( 'jcf', get_template_directory_uri() . '/js/jcf.js', '', '1.2.0', true );

		//Register JCF File Module
		wp_register_script( 'jcf.file', get_template_directory_uri() . '/js/jcf.file.js', '', '1.2.0', true );

		//Register JCF Radio Module
		wp_register_script( 'jcf.radio', get_template_directory_uri() . '/js/jcf.radio.js', '', '1.2.0', true );

		//Register JCF Range Module
		wp_register_script( 'jcf.range', get_template_directory_uri() . '/js/jcf.range.js', '', '1.2.0', true );

		//Register JCF Number Module
		wp_register_script( 'jcf.number', get_template_directory_uri() . '/js/jcf.number.js', '', '1.2.0', true );

		//Register JCF Select Module
		wp_register_script( 'jcf.select', get_template_directory_uri() . '/js/jcf.select.js', '', '1.2.0', true );

		//Register JCF Checkbox Module
		wp_register_script( 'jcf.checkbox', get_template_directory_uri() . '/js/jcf.checkbox.js', '', '1.2.0', true );

		$scripts_deps[] = 'jcf';
		$scripts_deps[] = 'jcf.file';
		$scripts_deps[] = 'jcf.radio';
		$scripts_deps[] = 'jcf.range';
		$scripts_deps[] = 'jcf.number';
		$scripts_deps[] = 'jcf.select';
		$scripts_deps[] = 'jcf.checkbox';

		wp_register_style( 'fabulous-fluid-jcf', get_template_directory_uri() . '/css/jcf.css', false, null );

		$styles_deps[] = 'fabulous-fluid-jcf';
	}

	$fonts_url = fabulous_fluid_fonts_url();
	if ( '' != $fonts_url ) {
		//Enqueue Google fonts
		wp_register_style( 'fabulous-fluid-fonts', fabulous_fluid_fonts_url(), array(), '1.0.0' );

		$styles_deps[] = 'fabulous-fluid-fonts';
	}

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '4.4.0' );

	wp_enqueue_style( 'fabulous-fluid-style', get_stylesheet_uri(), $styles_deps );

	wp_enqueue_script( 'fabulous-fluid-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'fabulous-fluid-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Register up Sidr Responsive Menu
	wp_register_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array('jquery'), '2.2.1.1', true );
	$scripts_deps[] = 'jquery-sidr';

	// Enqueue Fabulous Fluid Custom Scripts
	wp_enqueue_script( 'fabulous-fluid-custom-script', get_template_directory_uri() . '/js/custom.js', $scripts_deps, '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Loads up Cycle JS
	 */
	$featured_slider_option = apply_filters( 'fabulous_fluid_get_option', 'featured_slider_option' );

	if( 'disabled' != $featured_slider_option  ) {
		wp_register_script( 'jquery.cycle2', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.min.js', array( 'jquery' ), '2.1.5', true );

		/**
		 * Condition checks for additional slider transition plugins
		 */
		$featured_slide_transition_effect = apply_filters( 'fabulous_fluid_get_option', 'featured_slide_transition_effect' );

		// Scroll Vertical transition plugin addition
		if ( 'scrollVert' ==  $featured_slide_transition_effect ){
			wp_enqueue_script( 'jquery.cycle2.scrollVert', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.scrollVert.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Flip transition plugin addition
		else if ( 'flipHorz' ==  $featured_slide_transition_effect || 'flipVert' ==  $featured_slide_transition_effect ){
			wp_enqueue_script( 'jquery.cycle2.flip', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.flip.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Shuffle transition plugin addition
		else if ( 'tileSlide' ==  $featured_slide_transition_effect || 'tileBlind' ==  $featured_slide_transition_effect ){
			wp_enqueue_script( 'jquery.cycle2.tile', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.tile.min.js', array( 'jquery.cycle2' ), '20140128', true );
		}
		// Shuffle transition plugin addition
		else if ( 'shuffle' ==  $featured_slide_transition_effect ){
			wp_enqueue_script( 'jquery.cycle2.shuffle', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.shuffle.min.js', array( 'jquery.cycle2' ), '20140128 ', true );
		}
		else {
			wp_enqueue_script( 'jquery.cycle2' );
		}
	}

	/**
	 * Loads up Scroll Up script
	 */
	$disable_scrollup = apply_filters( 'fabulous_fluid_get_option', 'disable_scrollup' );

	if ( '1' != $disable_scrollup ) {
		wp_enqueue_script( 'fabulous-fluid-scrollup', get_template_directory_uri() . '/js/scrollup.js', array( 'jquery' ), '20141223	', true  );
	}
}
add_action( 'wp_enqueue_scripts', 'fabulous_fluid_scripts' );


function fabulous_fluid_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Istok Web, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$istok_web = _x( 'on', 'Istok Web font: on or off', 'fabulous-fluid' );

	if ( 'off' !== $istok_web ) {
		$fonts_url = '//fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic';
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles for Metaboxes
 * @uses wp_register_script, wp_enqueue_script, and  wp_enqueue_style
 *
 * @action admin_print_scripts-post-new, admin_print_scripts-post, admin_print_scripts-page-new, admin_print_scripts-page
 *
 * @since Fabulous Fluid 0.2
 */
function fabulous_fluid_enqueue_metabox_scripts() {
    //Scripts
    wp_enqueue_script( 'fabulous-fluid-metabox', get_template_directory_uri() . '/js/metabox.js', array( 'jquery', 'jquery-ui-tabs' ), '2016-05-22' );

	//CSS Styles
	wp_enqueue_style( 'fabulous-fluid-metabox-tabs', get_template_directory_uri() . '/css/metabox-tabs.css' );
}
add_action( 'admin_print_scripts-post-new.php', 'fabulous_fluid_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-post.php', 'fabulous_fluid_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page-new.php', 'fabulous_fluid_enqueue_metabox_scripts', 11 );
add_action( 'admin_print_scripts-page.php', 'fabulous_fluid_enqueue_metabox_scripts', 11 );

/**
 * Include Default Options for Fabulous Fluid
 */
require trailingslashit( get_template_directory() ) . 'inc/default-options.php';

/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Include Structure for Studio
 */
require trailingslashit( get_template_directory() ) . 'inc/structure.php';

/**
 * Adds Breadcrumb
 */
require trailingslashit( get_template_directory() ) . 'inc/breadcrumb.php';

/**
 * Include Sidebars and Widgets
 */
require trailingslashit( get_template_directory() ) . 'inc/widgets.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Include featured slider
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-slider.php';


/**
 * Include featured grid content
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-grid-content.php';


/**
 * Include featured slider
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-content.php';

/**
 * Include metabox
 */
require trailingslashit( get_template_directory() ) . 'inc/metabox.php';
