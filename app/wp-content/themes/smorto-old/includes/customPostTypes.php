<?php

// Custom Post Type
$labels = array(
	'name' => 'Portfolio',
	'singular_name' => 'Portfolio Item',
	'add_new' => 'Add New',
	'add_new_item' => 'Add New Portfolio Item',
	'edit_item' => 'Edit Portfolio Item',
	'new_item' => 'New Portfolio Item',
	'view_item' => 'View Portfolio Item',
	'search_items' => 'Search Portfolio Items',
	'not_found' => 'No portfolio items found',
	'not_found_in_trash' => 'No portfolio items found in Trash'
);

$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'capability_type' => 'page',
	'hierarchical' => true,
	'rewrite' => true,
	'supports' => array ( 'editor', 'thumbnail', 'title', 'page-attributes' ),
	'menu_position' => 5,
	'has_archive' => true,
	'taxonomies' => array( 'post_tag' )
);

register_post_type( 'portfolio', $args );

function register_portfolio_tags() {
	register_taxonomy_for_object_type('post_tag', 'portfolio');
}

add_action('init', 'register_portfolio_tags');

?>