<?php

// Requires htaccess script placed in uploads folder
// htaccess redirects all requests to a url that does not exist
// By hooking the 404 page template we can manipulate access to the uploads folder

add_filter('404_template', 'protected_attachments');

function protected_attachments( $template ) {
	$filename = urldecode($_SERVER['DOCUMENT_ROOT']) . urldecode($_SERVER['REQUEST_URI']);
	$guid = get_bloginfo('url') . urldecode($_SERVER['REQUEST_URI']);
	
	$securePages = get_posts( array('post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => 'page-secure.php') );
	foreach( $securePages as $securePage ) {
		$securePageAttachments[] = get_posts( array('post_type' => 'attachment', 'post_parent' => $securePage->ID) );
		foreach( $securePageAttachments as $secureAttachments ) {
			foreach( $secureAttachments as $secureAttachment ) {
				$attachmentGuids[] = $secureAttachment->guid;
			}
		}
	}
	
	if( !is_user_logged_in() && in_array( $guid, $attachmentGuids ) ) {
		return $template;
	} else {
		retrieve_file($filename);
		exit;
	}
}

function retrieve_file($filename) {
	//This section of code is modified from evDbFiles (http://virtima.pl/evdbfiles)
	$file_time = filemtime($filename);
	
	$send_304 = false;
	if (php_sapi_name() == 'apache') {
		// if our web server is apache
		// we get check HTTP
		// If-Modified-Since header
		// and do not send image
		// if there is a cached version
		$ar = apache_request_headers();
			if (isset($ar['If-Modified-Since']) && // If-Modified-Since should exists
			($ar['If-Modified-Since'] != '') && // not empty
			(strtotime($ar['If-Modified-Since']) >= $file_time)) { // and grater than file_time
			$send_304 = true;
		}
	}

	if ($send_304) {
		// Sending 304 response to browser
		// "Browser, your cached version of image is OK
		// we're not sending anything new to you"
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', $file_time).' GMT', true, 304);
	} else {
		// outputing Last-Modified header
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', $file_time).' GMT', true, 200);

		// Set expiration time +1 year
		// We do not have any photo re-uploading
		// so, browser may cache this photo for quite a long time
		header('Expires: '.gmdate('D, d M Y H:i:s',  $file_time + 86400*365).' GMT', true, 200);
		
		// outputing HTTP headers
		header('Content-Length: '.filesize($filename));

		//Not all php setups support this, eg. dreamhost
		$finfo = finfo_open(FILEINFO_MIME);
		$ftype = finfo_file($finfo, $filename);
		finfo_close($finfo);
		$ftype = mime_content_type($filename);

		header("Content-type: " . $ftype);

		ob_clean();
		flush();
		readfile($filename);
		exit;
	}
}

?>