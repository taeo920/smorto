<?php

/**
 * Loads template part file
 *
 * @param string $slug The slug name for the generic template or sub-directory
 * @param string $name The name of the specialised template
 * @param bool $echo Echo output immediately or buffered and returned
 * @param array $param Array of additional params to include in scope
 */
function try_get_template_part( $slug, $name, $echo = true, $params = array() ) {
    global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;

    do_action( "get_template_part_{$slug}", $slug, $name );

    $templates = array();
    if ( isset( $name ) ) {
    	$templates[] = "{$slug}/{$name}.php";
    	$templates[] = "{$slug}-{$name}.php";
    }
    $templates[] = "{$slug}.php";

    $template_file = locate_template( $templates, false, false );

    // Add query vars and params to scope
    if ( is_array( $wp_query->query_vars ) ) {
        extract( $wp_query->query_vars, EXTR_SKIP );
    }
    extract( $params, EXTR_SKIP );

    // Buffer output and return if echo is false
	if( !$echo ) ob_start();
    require( $template_file );
	if( !$echo ) return ob_get_clean();
}

/**
 * Loops through an array of posts objects and displays them using a given loop template
 *
 * @param array $posts Array of post objects
 * @param string $template Name of the loop template
 */
function try_posts_loop( $posts, $template ) {
    foreach( get_field('featured_projects') as $post ) {
        setup_postdata( $post );
        try_get_template_part('partials', 'loop-' . $template );
    }

    wp_reset_query();
}

/**
 * Loads comment template
 *
 * @param object $comment The comment object
 * @param array $args Comment arguments
 * @param int $depth The depth of the current comment
 */
function try_comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['args'] = $args;
	$GLOBALS['depth'] = $depth;
	get_template_part('partials/comment');
}

/**
 * Truncates a string to the nearest word under a given maximum length
 *
 * @param string $string The string which will be truncated
 * @param int $length The length to which to truncate the string
 * @param string $append A string that will be appended to the end of a truncated string
 */
function try_truncate( $string, $length, $append = '&hellip;' ) {
	if( strlen( $string ) > $length ) {
		$string = substr( $string, 0, strrpos( substr( $string, 0, $length ), ' ') );
		$string .= $append;
	}
	return $string;
}

/**
 * Parses a string for a YouTube video ID
 *
 * @param string $string Valid YouTube video URL or ID
 * @return string YouTube video ID
 */
function try_get_youtube_video_id( $string ) {
	if( !parse_url( $string, PHP_URL_HOST ) ) return $string;
	if ( strpos( $string, 'youtu.be/') === false && strpos( $string, '/embed/') === false ) {
	    parse_str( parse_url( $string, PHP_URL_QUERY ), $query );
	    $id = $query['v'];
	} else {
	    $id = basename( parse_url( $string, PHP_URL_PATH ) );
	}

	return $id;
}

/**
 * Creates a compressed zip archive from an array of files
 *
 * @param (array) $files Array of file locations ( on disk not HTTP )
 * @param (string) $destination Location and file name for the zip to be created
 * @param (bool) $overwrite Whether or not to overwrite the destination if it already exists
 * @param (bool) $preserve_folder_structure Whether or not to preserve the folder structure or grab only the files
 * @return (bool) Whether or not the destination file exists
 */
function try_create_zip( $files = array(), $destination = '', $overwrite = false, $preserve_folder_structure = false ) {
	// if the zip file already exists and overwrite is false, return false
	if( file_exists( $destination ) && !$overwrite ) { return false; }

	// vars
	$valid_files = array();

	// if files were passed in...
	if( is_array( $files ) ) {
		// cycle through each file
		foreach( $files as $file ) {
			// make sure the file exists
			if( file_exists( $file ) ) {
				$valid_files[] = $file;
			}
		}
	}
	// if we have good files...
	if( count( $valid_files ) ) {
		// create the archive
		$zip = new ZipArchive();
		if( $zip->open( $destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE ) !== true ) {
			return false;
		}

		// add the files
		foreach( $valid_files as $file ) {
			$localname = ( $preserve_folder_structure ) ? $file : basename( $file );
			$zip->addFile( $file, $localname );
		}

		// close the zip -- done!
		$zip->close();

		// check to make sure the file exists
		return file_exists( $destination );
	} else {
		return false;
	}
}

/**
 * Debug tool - displays contents of any variable wrapped in pre tags
 *
 * @param $variable Variable you want to debug
 */
function try_debug( $variable ) {
	echo "<pre>";
	if( is_array( $variable ) || is_object( $variable ) ) {
		print_r( $variable );
	} else {
		var_dump( $variable );
	}
	echo "</pre>";
}

/**
 * Converts a string into Twitter share friendly format
 * @param  string $string String to format
 * @return string         Twitter sharable string
 */
function try_format_twitter_text($string) {
  return htmlspecialchars(urlencode(html_entity_decode($string, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
}