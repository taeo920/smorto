<html>
<head></head>
<body>

	<?php while(have_posts()) : the_post(); ?>
		<?php $liveURL = get_post_meta( $post->ID, 'liveURL', true ); ?>
		<?php $agency = get_post_meta( $post->ID, 'agency', true ); ?>
		<?php $portfolioImage = the_portfolio_image_src('original'); ?>

		<div id="portfolio-single">
			<img class="screenshot" src="<?php echo $portfolioImage[0]; ?>" width="<?php echo $portfolioImage[1]; ?>" height="<?php echo $portfolioImage[2]; ?>" />
			<div class="inner-shadow"></div>
			<div class="description">
				<h1 class="title"><?php the_title(); ?> <small class="tags"><?php tag_list(); ?></small></h1>
				<?php if( $liveURL ) : ?><a class="visit" href="<?php echo $liveURL; ?>">visit site &raquo;</a><?php endif; ?>
				<div class="entry">
					<?php the_content(); ?>
					<?php if( $agency ) echo "<p><small>* Completed while working for " . $agency . "</small></p>"; ?>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

</body>
</html>