<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 center">


		<h1 class="page-title"><?php the_title(); ?></h1>
			<span id="excerpt"><?php the_excerpt(); ?></span>

		<? //var_dump($post);?>


	</header> <!-- end article header -->




    <div class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			$video_alert_text = get_field('video_heading');
			if ($video_alert_text) {
				echo '<p>'
				. $video_alert_text .
				'</p>';
			}

			 ?>

			 <?php
 		   if( have_rows('useful_links') ):
 		  echo '<div class="collection-links with-header"><h5 class="collection-header light center">Useful Links</h5>';
 		  		while ( have_rows('useful_links') ) : the_row();
 		  		$text = get_sub_field('link_text');
 		  		$link = get_sub_field('link_url');
 		  		?>


		 <a class="collection-item" href="<?php echo $link; ?>" class="secondary-content"><?php echo $text; ?></a>



 		  	<?php
 		  	 endwhile;
 		  	 echo '</div>';
 		  	 endif;
 		   ?>

	</div> <!-- end article section -->





</section> <!-- end article -->

<?php $image = get_field('panorama_image');
if( !empty($image) ):?>
<section class="panorama-section">
	<h5 class="center"><?php the_field('image_title');?></h5>
	<p>
		<?php the_field('image_description');?>
	</p>
	<div class="row" id="panorama">



	<img class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />



<?php
 if( have_rows('marker_details') ):

		while ( have_rows('marker_details') ) : the_row();?>

		<span class="tooltipped" data-position="<?php the_sub_field('text_position'); ?>" data-delay="50" data-tooltip="<?php the_sub_field('marker_text'); ?>" style="position: absolute; left: <?php the_sub_field('left_position'); ?>%; top: <?php the_sub_field('top_position'); ?>%;"></span>


	<?php
	 endwhile;
	 else :
			 // no rows found
	 endif;
 ?>



</div>

</section>

<?php endif; ?>

<?php
 if( have_rows('child_pages') ):?>
<section class="sub-pages">
<?php $sub_pages_title = get_field('sub_pages_title');
if( ($sub_pages_title) ):?>
	<h5 class="center"><?php echo $sub_pages_title;?></h5>
<?php endif;?>
<?php $sub_pages_desc = get_field('sub_pages_description');
if( ($sub_pages_desc) ):?>
<p><?php echo $sub_pages_desc;?></p>
<?php endif;?>

<aside id="child-wrapper" class="row purple">
<?php
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
	 echo '</aside></section>';
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


	<?php $video = get_field('video_url');

	if ($video){
		echo '<aside>
		<div class="video-container">' . $video . '

		</div>
		</aside>';
	}
?>
