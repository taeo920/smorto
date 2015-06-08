<?php

register_nav_menus( array( 'header' => 'Header' ) );
add_theme_support( 'post-thumbnails' );
add_image_size( 'portfolio-thumbnail', 240, 100, true );
add_theme_support( 'automatic-feed-links' );
//add_image_size( 'portfolio-large', 830, 800, true );
//add_post_type_support( 'page', 'excerpt' );
//add_filter("gform_tabindex_1", create_function("", "return 15;"));

include_once("includes/adminCustomization.php");
include_once("includes/customPostTypes.php");
include_once("includes/attachmentFunctions.php");
include_once("includes/customFields.php");
//include_once("includes/commentList.php");
//include_once("includes/widgetAreas.php");
//include_once("includes/customTaxonomies.php");
//include_once("includes/customWidgets.php");
//include_once("includes/excerptCustomization.php");
//include_once("includes/customArchive.php");
//include_once("includes/secureUploads.php");
//include_once("includes/ajax.php");

function tag_list() {
	global $post;
	
	$tags = wp_get_post_terms( $post->ID, 'post_tag' );
	if( $tags ) {
		$count = count( $tags );
		foreach( $tags as $key => $tag ) {
			echo $tag->name;
			if( $key < $count - 1 ) {
				echo " / ";
			}
		}
	}
}

function tag_classes() {
	global $post;
	
	$tags = wp_get_post_terms( $post->ID, 'post_tag' );
	if( $tags ) {
		$count = count( $tags );
		foreach( $tags as $key => $tag ) {
			echo $tag->slug;
			if( $key < $count - 1 ) {
				echo " ";
			}
		}
	}
}

function debug( $variable ) {
	echo "<pre>";
	print_r( $variable );
	echo "</pre>";
}

?>