<?php

// Custom Archive List
function expanding_archive() {
	global $wpdb, $wp_locale;
	
	$query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY YEAR(post_date) ORDER BY post_date DESC";

	$years = $wpdb->get_results($query);
	
	foreach( $years as $year ) {
		$url = get_year_link( $year->year );
		$text = sprintf( '%d (%d)', $year->year, $year->posts );
		$output .= sprintf( '<li class="year"><a href="%s">%s</a><ul>', $url, $text );
		
		$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND YEAR(post_date) = $year->year GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
		$months = $wpdb->get_results($query);
		
		foreach( $months as $month ) {
			$url = get_month_link( $month->year, $month->month );
			$text = sprintf( '%s (%d)', $wp_locale->get_month( $month->month ), $month->posts );
			$output .= get_archives_link( $url, $text );
		}
		
		$output .= "</ul>";
	}
	
	echo $output;
}

?>