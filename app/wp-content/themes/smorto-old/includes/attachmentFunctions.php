<?php

// Get the First Image Attached to the Current Post
function the_portfolio_image_src($size = 'thumbnail') {
	global $post;

	$images = get_children( array('exclude' => get_post_thumbnail_id( $post->ID ), 'post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order') );

	if ($images) {
		$image = array_shift($images);
		$imageSrc = wp_get_attachment_image_src($image->ID, $size);
		return $imageSrc;
	}

	return false;
}

?>