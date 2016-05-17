<div class="col s12">
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_option('home')?>"> Home</a>
	<?php if($post->post_parent){?>
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a>
	<?php }?>
	<?php if(is_page('profile')){?>
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_permalink( get_page_by_path( 'Events' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'Events' )); ?></a>
	<?php }?>
	<i class="grey-text mdi mdi-chevron-right"></i><span> <?php the_title(); ?></span>
</div>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">


		<h1 class="page-title center"><?php the_title(); ?></h1>

		<? //var_dump($post);?>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->


</article> <!-- end article -->
<aside class="row">
	<?php
	  $children = get_pages('title_li=&child_of='.$post->ID.'&echo=0');
	  if ($children) {
		foreach ($children as $child) {
		$trimmed = wp_trim_words( $child->post_content, $num_words = 55, $more = null );
	   echo '<article class="col s6"><section style="padding: 1em;" class="light-green lighten-5"><h3 class="center"><a href="' . $child->guid . '">' . $child->post_title . '</a></h3>' . $trimmed . '</section></article>';
		}
	} ?>
</aside>
