<?php

/**
 * Taxonomy Declaration
 */
$labels = array(
	'name' => 'Experience Types',
	'singular_name' => 'Experience Type',
	'search_terms' => 'Search Experience Types',
	'popular_terms' => 'Popular Experience Types',
	'all_items' => 'All Experience Types',
	'parent_item' => 'Parent Experience Type',
	'parent_item_colon' => 'Parent Experience Type:',
	'edit_item' => 'Edit Experience Type',
	'update_item' => 'Update Experience Type',
	'add_new_item' => 'Add New Experience Type',
	'new_item_name' => 'New Experience Type Name',
	'separate_items_with_commas' => 'Separate Experience Types with commas',
	'add_or_remove_items' => 'Add or remove Experience Types',
	'choose_from_most_used' => 'Choose from the most used Experience Types',
	'menu_name' => 'Experience Types'
);

$args = array(
	'labels' => $labels,
	'public' => false,
	'show_in_nav_menus' => true,
	'show_ui' => true,
	'hierarchical' => false,
);

register_taxonomy( 'experience-type', 'experience', $args );