<?php get_header(); ?>

	<?php while(have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<div class="entry"><?php the_content(); ?></div>
		
		<div id="comment-area">
			<?php comments_template(); ?>
		</div>

	<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>