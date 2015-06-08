<?php get_header(); ?>

	<div id="content">

		<ul>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			
				<li class="post" id="<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
						<?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read more</a>
					</div>
				</li>
	
			<?php endwhile; else : ?>
	
				<li class="post">
					<h2>Posts Not Found</h2>
					<p>No posts were found that match your criteria.</p>
				</li>
	
			<?php endif; ?>
		</ul>
		
		<div class="postNav">
			<div class="prev"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		
	</div> <!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>