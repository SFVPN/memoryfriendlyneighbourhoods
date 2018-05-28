<!-- This adds social media sharing functionality where-ever the partial is included. Any links shared to Twitter will be shared via the Twitter handle added when customizing the theme. -->
<?php $title = str_replace( ' ', '%20', get_the_title());
      $siteName = $title = str_replace( ' ', '%20', get_bloginfo('name'));
?>

<ul class="share-links center columns">
  <li><a href="https://twitter.com/intent/tweet?url=<?php echo wp_get_shortlink(); ?>&via=<?php echo get_theme_mod( 'tcx_twitter_handle' );?>&text=<?php echo $title; ?>" aria-label="Click to share on Twitter" title="Share on Twitter" target="_blank"><i class="mdi mdi-twitter" aria-hidden="true"></i></a></li>

  <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo wp_get_shortlink(); ?>&title=<?php echo $title; ?>&summary=<?php echo wp_filter_nohtml_kses( $content );?>&source=<?php echo $siteName; ?>" aria-label="Click to share on Linkedin" title="Share on Linkedin" target="_blank"><i class="mdi mdi-linkedin" aria-hidden="true"></i></a></li>

	<li><a href="mailto:?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php echo $siteName; ?>&body=<?php echo $title; ?>%20<?php echo wp_get_shortlink() ?>" aria-label="Click to share by email" title="Email to a friend/colleague" target="_blank"><i class="mdi mdi-email" aria-hidden="true"></i></a> </li>

  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink() ?>" aria-label="Click to share on Facebook" title="Share on Facebook" target="_blank"><i class="mdi mdi-facebook" aria-hidden="true"></i></a> </li>
</ul>
