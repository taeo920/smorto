<?php

// Add Custom Inputs
add_action("admin_init", "admin_init");
add_action("save_post", "save_post");

function admin_init() {
	add_meta_box( "portfolio", "Portfolio", "add_portfolio_fields", "portfolio", "normal", "high" );
}

function add_portfolio_fields() {
	global $post;
	$custom = get_post_custom( $post->ID );
	$liveURL = $custom["liveURL"][0];
	$agency = $custom["agency"][0];
	wp_nonce_field("metaNonce", 'metaNonce'); ?>
	
	<ul>
		<li>
			<label for="liveURL">Live URL:</label>
			<input type="text" size="31" name="liveURL" id="liveURL" value="<?php echo $liveURL; ?>" />
		</li>
		<li>
			<label for="agency">Agency:</label>
			<select name="agency" id="agency">
				<option value="">Freelance/Personal</option>
				<option value="Weber Shandwick" <?php if( $agency == "Weber Shandwick" ) echo "selected"; ?>>Weber Shandwick</option>
				<option value="Groove Commerce" <?php if( $agency == "Groove Commerce" ) echo "selected"; ?>>Groove Commerce</option>
			</select>
		</li>
	</ul> <?php
}

function save_post() {
	global $post;
	if ( wp_verify_nonce( $_POST['metaNonce'], 'metaNonce' ) ) {
		if( $_POST["liveURL"] ) update_post_meta( $post->ID, "liveURL", $_POST["liveURL"] );
		if( $_POST["agency"] ) update_post_meta( $post->ID, "agency", $_POST["agency"] );
	}
}

?>