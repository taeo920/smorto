<?php

/**
 * Post Type Declaration
 */
$labels = array(
	'name' => 'Experience',
	'singular_name' => 'Experience',
	'add_new' => 'Add New',
	'add_new_item' => 'Add New Experience',
	'edit_item' => 'Edit Experience',
	'new_item' => 'New Experience',
	'view_item' => 'View Experience',
	'search_items' => 'Search Experiences',
	'not_found' => 'No Experiences Found',
	'not_found_in_trash' => 'No Experiences Found in Trash',
	'menu_name' => 'Experience'
);

$args = array(
	'labels' => $labels,
	'description' => '',
	'public' => false,
	'exclude_from_search' => true,
	'publicly_queryable' => false,
	'show_ui' => true,
	'show_in_nav_menus' => false,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 10,
	'menu_icon' => 'dashicons-awards', // http://melchoyce.github.io/dashicons/
	'capability_type' => 'post',
	'hierarchical' => true,
	'supports' => array('title', 'editor'),
	'taxonomies' => array('experience-type'),
	'has_archive' => true
);

register_post_type('experience', $args );