<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 center">


		<h1 class="page-title"><?php the_title(); ?></h1>
			<span id="excerpt"><?php the_excerpt(); ?></span>

		<? //var_dump($post);?>


	</header> <!-- end article header -->




    <section class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			 ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->



</section> <!-- end article -->


<?php
 if( have_rows('child_pages') ):
echo '<aside id="child-wrapper" class="row purple">';
		while ( have_rows('child_pages') ) : the_row();
		$img = get_sub_field('subpage_image');
		$section_title = get_sub_field('section_title');
		?>
		<div id="<?php echo $section_title; ?>" class="col s12 l6 child-pages-sections center" style="background: <?php the_sub_field('background_colour'); ?>;"  >
			<div class="" style="color: <?php the_sub_field('text_colour'); ?>;">
				<h4><?php the_sub_field('section_title'); ?></h4>

					<img src="<?php echo $img; ?>" alt="<?php echo $section_title; ?> representative image">
			</div>
			<div class="col s12">
				<a class="btn-large transparent z-depth-0 waves-effect" style="color: <?php the_sub_field('text_colour'); ?>;" href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('button_text'); ?></a>
			</div>

		</div>

	<?php
	 endwhile;
	 echo '</aside>';
	 else :
		 $children = get_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_column=post_date&sort_order=desc');
		if ($children) {
		echo '<section class="col s12">';
		foreach ($children as $child) {
		//$trimmed = wp_trim_words( $child->post_content, $num_words = 30, $more = null );
		 echo '<div class="col s12 m6"><div class="white"><h3 class="light"><a href="' . $child->guid . '">' . $child->post_title . '</a></h3>' . $child->post_excerpt . '</div></div>';

		}
		echo '</section>';
	}
	 endif;
 ?>



<!-- <aside id="child_pages" class="row grey lighten-3">
	<?php
	  $children = get_pages('title_li=&child_of='.$post->ID.'&echo=0&sort_column=post_date&sort_order=desc');
	  if ($children) {
		echo '<section class="col s12">';
		foreach ($children as $child) {
		//$trimmed = wp_trim_words( $child->post_content, $num_words = 30, $more = null );
	   echo '<div class="col s12 m6"><div class="white"><h3 class="light"><a href="' . $child->guid . '">' . $child->post_title . '</a></h3>' . $child->post_excerpt . '</div></div>';

		}
		echo '</section>';
	} ?>
</aside> -->
