<?php
	if ( post_password_required() ) {
		return;
	}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here ?>

	<?php if ( have_comments() ) : ?>
		<h5 class="comments-title">
			<?php

			add_filter( 'comments_clauses', 'wpse_78490_child_comments_only' );

function wpse_78490_child_comments_only( $clauses )
{
    $clauses['where'] .= ' AND comment_parent = 0';
    return $clauses;
}

$count = get_comments( array('post_id' => $post->ID, 'count' => true) );
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One discussion on &ldquo;%2$s&rdquo;', '%1$s discussions on %2$s', $count , 'comments title', 'jointswp' ) ),
					number_format_i18n( $count ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h5>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'jointswp' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'jointswp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'jointswp' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="commentlist">
			<?php wp_list_comments('type=comment&callback=joints_comments'); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'jointswp' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'jointswp' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'jointswp' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jointswp' ); ?></p>
	<?php endif; ?>

	<?php comment_form(array('class_submit'=>'btn', 'title_reply' => __( '<h5>Add your voice to the discussion</h5>' ), 'cancel_reply_before' => __( '<span class="waves-effect waves-light">' ), 'cancel_reply_after' => __( '</span>' ), 'comment_field' => '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">' . _x( 'Leave Your Comment Here', 'noun' ) . '</label><textarea id="comment" placeholder="Leave Your Comment Here..." class="textarea" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>')); ?>

</div><!-- #comments -->
