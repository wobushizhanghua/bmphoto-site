<?php
/**
 * @package Hello_Dolly11
 * @version 1.6
 */
/*
Plugin Name: Hello Dolly

*/
function clauses_filter($query) {
	$query['where'] = "AND wp_posts.post_type = 'post' 
	AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'private')";
	return $query;
}
function content_filter($content) {
	foreach($content as &$post) {
		if (get_post_format($post) != 'image') {
			continue;
		}
		preg_match_all('/<img.*src.*=.*[\'"](.*)[\'"][^>]*>/iU', $post->post_content, $matches);
		if ($matches[0][0]) {
			$post->post_content = "<a href='{$matches[1][0]}' data-lightbox='set{$post->ID}'>" . $matches[0][0] . "</a>";
			$post->post_content .= "<div style='display:none'>";
			for ($i = 1; $i < count($matches[1]); $i++) {
				$post->post_content .= "<a href='{$matches[1][$i]}' data-lightbox='set{$post->ID}'>" . $matches[0][$i] . "</a>";
			}
			$post->post_content .= "</div>";
		}
	}
	return $content;
}
add_action( 'the_posts', 'content_filter' );

function my_parse_query($query) {
	if (count($query->query) == 0) {
		//index page
		add_action('posts_clauses', 'clauses_filter');
	}
}
add_action( 'parse_query', 'my_parse_query' );

function themeslug_enqueue_style() {
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css',array(), '0');
	wp_enqueue_script( 'lightbox1', get_template_directory_uri() . '/js/lightbox-plus-jquery.js', array(), '20130115');
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );