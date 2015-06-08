$(document).ready(function() {
	// Home Page Slideshow
	setInterval( function() {
		$("#slides .active").fadeOut( 1000 );
		if( $("#slides .active").next("img").size() ) {
			$("#slides .active").next("img").fadeIn( 1000, function() {
				$("#slides .active").removeClass("active");
				$(this).addClass("active");
			});
		} else {
			$("#slides img").eq(0).fadeIn( 1000, function() {
				$("#slides .active").removeClass("active");
				$(this).addClass("active");
			});
		}
		
	}, 4000 );
	
	// Smooth Scroll to Top
	$(".topLink a").click( function() {
		$("html, body").animate({ "scrollTop": 0 }, "slow");
		return false;
	});
	
	// Portfolio Lightbox
	$("#portfolio a").fancybox({
		'autoDimensions'	:	true,
		'padding'				:	1,
		'overlayOpacity'	:	0.5,
		'overlayColor'		:	'#000',
		'onComplete'		:	function() {
			var description = $(".description");
			description.animate({ "bottom": 0 }, "slow");
			_gaq.push(['_trackPageview', $(this).attr("href")]);
		}
	});
	
	// Portfolio Isotope Init
	$("#portfolio").isotope();
	
	// Portfolio Isotope Filters
	$('#filters a').click( function() {
		var selector = $(this).attr('data-filter');
		$('#portfolio').isotope({ filter: selector });
		$('#filters a').removeClass('active');
		$(this).addClass('active');
		return false;
	});
	
	// Track Clicks on Resume
	$('.resume').click( function() {
		_gaq.push(['_trackPageview', "/resume"]);
	});
});