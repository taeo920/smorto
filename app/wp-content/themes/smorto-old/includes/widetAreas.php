<?php

register_sidebar( array(
	'name' => 'Sidebar',
	'id' => 'sidebar',
	'description' => 'Sidebar',
	'before_widget' => '<li class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
) );

?>