<?php

// Custom Admin CSS
function custom_admin_css() {
	wp_enqueue_style( 'custom_admin_css', get_bloginfo('template_url') . '/styles/admin.css' );
}

function custom_login_header_url() {
    echo bloginfo('url');
}

function custom_login_header_title() {
    echo get_option('blogname');
}

add_action('admin_init', 'custom_admin_css');
add_filter('login_headerurl', 'custom_login_header_url');
add_filter('login_headertitle', 'custom_login_header_title');

?>