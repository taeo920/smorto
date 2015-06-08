<?php get_header(); ?>

	<div id="content">
	
		<?php while(have_posts()) : the_post(); ?>
			
			<h1><?php the_title(); ?></h1>
			<div class="entry"><?php the_content(); ?></div>
	
		<?php endwhile; ?>
		
	</div> <!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>