<?php

// Change excerpt 'more' link text
function custom_excerpt_more( $more ) {
	global $post;
	return ' [...]  <a href="'. get_permalink($post->ID) . '">Read More</a>';
}

// Change exerpt length
function custom_excerpt_length( $length ) {
	return 50;
}

//add_filter('excerpt_more', 'custom_excerpt_more');
//add_filter('excerpt_length', 'custom_excerpt_length');

?>