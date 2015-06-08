<?php

// Custom Taxonomy
$labels = array(
	'name' => 'Taxonomies',
	'singular_name' => 'Taxonomy',
	'search_terms' => 'Search Taxonomies',
	'popular_terms' => 'Popular Taxonomies',
	'all_items' => 'All Taxonomies',
	'parent_item' => 'Parent Taxonomy',
	'parent_item_colon' => 'Parent Taxonomy:',
	'edit_item' => 'Edit Taxonomy',
	'update_item' => 'Update Taxonomy',
	'add_new_item' => 'Add New Taxonomy',
	'new_item_name' => 'New Taxonomy Name',
	'separate_items_with_commas' => 'Separate taxonomies with commas',
	'add_or_remove_items' => 'Add or remove taxonomies',
	'choose_from_most_used' 'Choose from the most used taxonomies',
	'menu_name' => 'Taxonomies'
);

$args = array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'query_var' => true,
	'rewrite' => true	
);

register_taxonomy( 'taxonomy', 'post-type', $args );

?>