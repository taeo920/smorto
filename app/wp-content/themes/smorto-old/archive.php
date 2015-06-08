<?php get_header(); ?>

	<?php if ( have_posts() ) : the_post(); ?>
		<?php /* If this is a category archive */ if ( is_category() ) : ?>
			<h1 class="archive"><?php single_cat_title(); ?></h1>
		<?php /* If this is a tag archive */ elseif( is_tag() ) : ?>
			<h1 class="archive"><?php single_tag_title(); ?></h1>
		<?php /* If this is a daily archive */ elseif ( is_day() ) : ?>
			<h1 class="archive">Daily Archives: <?php the_time('F jS, Y'); ?></h1>
		<?php /* If this is a monthly archive */ elseif ( is_month() ) : ?>
			<h1 class="archive">Monthly Archives: <?php the_time('F, Y'); ?></h1>
		<?php /* If this is a yearly archive */ elseif ( is_year() ) : ?>
			<h1 class="archive">Yearly Archives: <?php the_time('Y'); ?></h1>
		<?php /* If this is a paged archive */ elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
			<h1 class="archive">Blog Archives</h1>
	<?php endif; endif; rewind_posts(); ?>
		
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
				<h2>Page Not Found</h2>
				<p>No posts were found that match your criteria.</p>
			</li>

		<?php endif; ?>
	</ul>
	
	<div class="postNav">
		<div class="prev"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>