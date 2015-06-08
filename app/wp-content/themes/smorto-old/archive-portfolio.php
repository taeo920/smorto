<?php get_header(); ?>
<?php
	$tags = get_terms("post_tag");
	$wp_query->query["orderby"] =  "menu_order";
	$wp_query->query["order"] = "ASC";
	query_posts( $wp_query->query );
?>

	<ul id="filters" class="clear">
		<li>Filters:</li>
		<li><a class="active" href="#" data-filter="*">All</a></li>
		<?php foreach( $tags as $tag ) : ?>
			<li><a href="#" data-filter=".<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<ul id="portfolio">
		<?php while(have_posts()) : the_post(); ?>
			<li class="<?php tag_classes(); ?>">
				<a href="/portfolio/<?php echo $post->post_name; ?>"><?php the_post_thumbnail('portfolio-thumbnail'); ?></a>
			</li>
		<?php endwhile; ?>
	</ul>

<?php get_footer(); ?>