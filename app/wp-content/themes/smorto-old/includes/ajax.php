<?php

wp_enqueue_script( 'ajax', get_bloginfo('template_url') . '/js/ajax.js', array('jquery') );
wp_localize_script( 'ajax', 'ajax', array( 'url' => admin_url('admin-ajax.php') ) );

add_action( 'wp_ajax_nopriv_function_name', 'function_name' );
add_action( 'wp_ajax_function_name', 'function_name' );

function function_name() {
	extract( $_POST, EXTR_SKIP );
	
	$array[];
	
	$arrayJson = json_encode($array);
	echo $arrayJson;
	exit;
}

?>