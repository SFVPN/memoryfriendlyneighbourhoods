<ul class="share-links center columns">
    <li><a href="https://twitter.com/intent/tweet?url=<?php echo wp_get_shortlink(); ?>&via=<?php echo get_theme_mod( 'tcx_twitter_handle' );?>&text=<?php the_title(); ?>" title="Share on Twitter" target="_blank"><i class="mdi mdi-twitter"></i></a></li>

    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo wp_get_shortlink(); ?>&title=<?php the_title(); ?>&summary=<?php echo wp_filter_nohtml_kses( $content );?>&source=<?php bloginfo('name'); ?>" title="Share on Linkedin" target="_blank"><i class="mdi mdi-linkedin"></i></a></li>

	<li><a href="mailto:?subject=I wanted to share this post with you from <?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>&#32;&#32;<?php echo wp_get_shortlink() ?>" title="Email to a friend/colleague" target="_blank"><i class="mdi mdi-email"></i></a> </li>

    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink() ?>" title="Share on Facebook" target="_blank"><i class="mdi mdi-facebook"></i></a> </li>
</ul>
