<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> role="article">
	<section class="card-content">
		<h2><a href="<?php echo $post->guid; ?>" class="center" rel="bookmark" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h2>

			<?php get_template_part( 'parts/content', 'byline' ); ?>

	</section>


</article>
<?php //}?>
