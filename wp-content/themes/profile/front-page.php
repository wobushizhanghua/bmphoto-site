<?php

/**
 * The front page template for our theme.
 *
 *
 * @package Profile
 */
 
 
 
 if ( 'posts' == get_option( 'show_on_front' ) ) {
    get_template_part('template-parts/featured-home');
}
 elseif(get_option('show_on_front')== 'page') {
	 get_template_part('page');
 }
 else {
      get_template_part('index');
}

 