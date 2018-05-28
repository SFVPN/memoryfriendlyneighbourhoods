<?php
// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('card'); ?>>
		<div class="media-object">
			<div class="chip">
        <header class="comment-author">
          <?php
            // create variable
            $bgauthemail = get_comment_author_email();
            echo get_avatar( $comment, 32 );
          ?>
          <?php printf(__('%s', 'jointswp'), get_comment_author_link()) ?> on
          <time class="hide-on-med-and-down" datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointswp')); ?> </a></time>
          <time class="hide-on-large-only" datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' d-m-y @ G:i', 'jointswp')); ?> </a></time>
          <?php edit_comment_link(__('(Edit)', 'jointswp'),'  ','') ?>
        </header>
			  </div>
        <span class="badge waves-effect waves-light hide-on-small-only">
          <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
        </span>

			<div class="media-object-section">
				<article id="comment-<?php comment_ID(); ?>" class="col s12">

					<?php if ($comment->comment_approved == '0') : ?>
						<div class="alert alert-info">
							<p><?php _e('Your comment is awaiting moderation.', 'jointswp') ?></p>
						</div>
					<?php endif; ?>
					<section class="comment_content clearfix">
						<?php comment_text() ?>
            <span class="hide-on-med-and-up">
              <?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="mdi mdi-reply-all"></i> Reply ', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
            </span>
					</section>


				</article>
			</div>
		</div>
	<!-- </li> is added by WordPress automatically -->
<?php
}
