<!DOCTYPE html>
<!--[if lte IE 8 ]> <html <?php language_attributes(); ?> class="ie ie8 lte9 lte8 no-js"> <![endif]-->
<!--[if IE 9 ]>     <html <?php language_attributes(); ?> class="ie ie9 lte9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="cleartype" content="on">
    
    <title><?php wp_title('|'); ?></title>
    <meta name="author" content="Steve Morton">	
    <meta name="description" content="Portfolio and interactive resume of Steve Morton, a Web Developer in Baltimore, MD specializing in PHP CMS development.">
    <meta name="keywords" content="Steve Morton, Web Developer, WordPress, PHP, CMS">
    
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/fb-share.png">
    <meta property="og:title" content="<?php wp_title('|'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Portfolio and interactive resume of Steve Morton, a Web Developer in Baltimore, MD specializing in PHP CMS development.">
    
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/png">
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" type="image/png">

	<?php wp_head(); ?>

	<!--[if lte IE 9 ]>
		<script src="<?php bloginfo('template_url') ?>/scripts/vendor/respond.js"></script>
		<script src="<?php bloginfo('template_url') ?>/scripts/vendor/mediamatch.js"></script>
	<![endif]-->
</head>