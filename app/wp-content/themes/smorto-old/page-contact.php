<?php get_header(); ?>

	<div id="portrait">
		<img src="<?php bloginfo('template_url'); ?>/images/portrait.jpg" alt="Steve Morton" />
	</div>
	
	<div id="contact">
		
		<?php while(have_posts()) : the_post(); ?>
		
			<?php gravity_form(1, false, true, false ); ?>
		
		<?php endwhile; ?>
			
	</div>
	
<?php get_footer(); ?>