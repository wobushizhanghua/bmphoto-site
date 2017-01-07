<?php


/* ----------------------------------------------------------------------------------- */
/* Suggested Plugin Jetpack
/*----------------------------------------------------------------------------------- */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'profile_register_required_plugins' );
function profile_register_required_plugins() {
	$plugins = array(
	array(
			'name'      => __('Jetpack by WordPress.com','profile'),
			'slug'      => 'jetpack',
			'required'  => false,
		),
		);
		$config = array(
		'id'           => 'profile',               // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
);

	tgmpa( $plugins, $config );
}	
/* ----------------------------------------------------------------------------------- */
/* Customize Comment Form
/*----------------------------------------------------------------------------------- */
add_filter( 'comment_form_default_fields', 'profile_comment_form_fields' );
function profile_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns"><label for="middle-label" class="text-right middle">' . '<span class="prefix"><i class="fa fa-user"></i>'. ( $req ? ' <span class="required">* </span>' : '' ) . '</span></label></div>' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="'. esc_attr_x( 'Name','placeholder','profile' ) .'" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'email'  => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns">' . ' <label for="middle-label" class="text-right middle"><span class="prefix"><i class="fa fa-envelope-o"></i>' . ( $req ? ' <span class="required">* </span>' : '' ) . '</span></label></div> ' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="'. esc_attr_x( 'Email','placeholder','profile' ) .'" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="20"' . $aria_req . ' /></div></div></div>',
        'url'    => '<div class="large-6 columns"><div class="row collapse prefix-radius"><div class="small-2 columns">' . ' <label for="middle-label" class="text-right middle"><span class="prefix"><i class="fa fa-external-link"></i>'  . '</span></label></div>' .
                    '<div class="small-10 columns"><input class="form-control" placeholder="'. esc_attr_x('Website','placeholder','profile' ) .'" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div>'        
    );
    
    return $fields;
    
    
}

add_filter( 'comment_form_defaults', 'profile_comment_form' );
function profile_comment_form( $argsbutton ) {
        $argsbutton['class_submit'] = 'float-center button'; 
    
    return $argsbutton;
}
/* ----------------------------------------------------------------------------------- */
/* Pagination
  /*----------------------------------------------------------------------------------- */

if ( ! function_exists( 'profile_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function profile_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&laquo; Previous', 'profile' ),
		'next_text' => __( 'Next &raquo;', 'profile' ),
        'type'     => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'profile' ); ?></h1>
		<ul class="pagination loop-pagination">
			<?php echo $links; ?>
		</ul><!-- .pagination -->
	</nav><!-- .navigation -->
	<style>div#infinite-handle{display:none;} </style>
	<?php
	endif;
}
endif;

/* ----------------------------------------------------------------------------------- */
/* Custom CSS Output
/*----------------------------------------------------------------------------------- */

function profile_custom_css_output(){
    
    echo '<style type="text/css">';	  
	
	if(get_theme_mod('profile_post_thumb')=="disable"){
    echo 'img.attachment-profile_mainfeatured.size-profile_mainfeatured.wp-post-image{width: 100%;}';}
    echo '.floatingmenu #primary-menu > li.menu-item > ul{background: '.esc_html(get_theme_mod('topnavbgcolorsub','#20598a')).' !important;}';
    echo '.floatingmenu,.floatingmenu div.large-8.columns{background-color: '.esc_html(get_theme_mod('topnavbgcolor','#40ACEC')).' !important;}';
    echo '.floatingmenu li.page_item a, .floatingmenu li.menu-item a{color: '.esc_html(get_theme_mod('topnavbgcolorfont','#ffffff')).' !important;}';
    echo '.floatingmenu{position: '.esc_attr(get_theme_mod('radio_menu','fixed')).' !important;}';
	echo '.header-area{height:'.esc_attr(get_theme_mod('profile_header_height','400px')).' !important;}';
	echo '.intro-text{margin-top:'.esc_attr(get_theme_mod('profile_logo_position','9%')).' !important;}';

	if ( get_theme_mod('profile_body_font') ) :
		echo "body { font-family: ".esc_attr(get_theme_mod('profile_body_font'))."; }";
	endif;
	if ( get_theme_mod('profile_title_font') ) :
		echo "h1.site-title, h1.entry-title, h2.entry-title { font-family: ".esc_attr(get_theme_mod('profile_title_font'))."; }";
	endif;
    echo '</style>';
    
}
add_action('wp_head','profile_custom_css_output');

if ( function_exists('yoast_breadcrumb') ) { 
function profile_breadcrumb_support(){		
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');		
}
add_action('profile_before_single_post_title','profile_breadcrumb_support');
}


/******************************************
* Menu Walker
******************************************/

class profile_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'menu ',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );
 
        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . ' ">' . "\n";
    }
 
    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
 
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}