<?php

/**
 * Post Type Declaration
 */
$labels = array(
	'name' => 'Project',
	'singular_name' => 'Project',
	'add_new' => 'Add New',
	'add_new_item' => 'Add New Project',
	'edit_item' => 'Edit Project',
	'new_item' => 'New Project',
	'view_item' => 'View Project',
	'search_items' => 'Search Projects',
	'not_found' => 'No Projects Found',
	'not_found_in_trash' => 'No Projects Found in Trash',
	'menu_name' => 'Projects'
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
	'menu_icon' => 'dashicons-welcome-widgets-menus', // http://melchoyce.github.io/dashicons/
	'capability_type' => 'post',
	'hierarchical' => true,
	'supports' => array( 'title', 'editor', 'thumbnail' ),
	'taxonomies' => array(),
	'has_archive' => true
);

register_post_type('project', $args );