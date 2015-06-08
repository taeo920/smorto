<?php

function commentList($comment, $args, $depth) { 
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class("clear"); ?> id="<?php comment_id(); ?>">
		<div class="entry">
			<cite>On <?php comment_date('M. j, Y'); ?> at <?php comment_time(); ?>, <?php comment_author_link(); ?> said: <?php edit_comment_link('Edit'); ?> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></strong></cite>
			
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p><em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em></p>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>
	</li>
<?php } 

?>