<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo('title'); wp_title( '|', true ); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scripts.js" type="text/javascript"></script>
	
	<?php if( !is_user_logged_in() ) : ?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-7944904-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<!--[if lt IE 7]>	<body <?php body_class("ie ie6 lte9 lte8 lte7 lte6"); ?>>	<![endif]-->
<!--[if IE 7]>		<body <?php body_class("ie ie7 lte9 lte8 lte7"); ?>>		<![endif]-->
<!--[if IE 8]>		<body <?php body_class("ie ie8 lte9 lte8"); ?>>				<![endif]-->
<!--[if IE 9]>		<body <?php body_class("ie ie9 lte9"); ?>>					<![endif]-->
<!--[if gt IE 9]>	<body <?php body_class("ie"); ?>>							<![endif]-->
<!--[if !IE]><!-->	<body <?php body_class(); ?>>								<!--<![endif]-->
	
	<div id="container">
		<div id="header">
			<a class="logo" href="/"><img src="<?php echo bloginfo('template_url'); ?>/images/logo.png" alt="smorto" /></a>
			<?php wp_nav_menu( array("theme_location" => "header", "container" => "") ); ?>
		</div>
		<div id="main" class="clear">