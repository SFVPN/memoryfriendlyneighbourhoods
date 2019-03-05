
<?php $backgroundImage = get_the_post_thumbnail_url(get_the_ID(),'full');?>
<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 center grey lighten-3"
	<?php if ($backgroundImage) {?>
		style="background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>) no-repeat; background-size: cover;"
	<?php } ?>
	>


		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php $byline = get_field("byline");
		if ($byline) {?>
			<span id="excerpt" class="teal white-text"><?php echo $byline; ?></span>
		<?php } ?>

		<?php $register = get_field("network_registration");
		if ($register) {?>
			<div id="excerpt" class="fixed-action-btn"><a class="btn-flat red white-text" href="<?php echo get_field("network_registration"); ?>">Join</a></div>
		<?php } ?>


	</header> <!-- end article header -->




    <div class="entry-content col s12" itemprop="articleBody">
			<div class="container">
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
		 </div>
	</div> <!-- end article section -->





</section> <!-- end article -->

<?php $image = get_field('panorama_image');
if( !empty($image) ):?>
<section class="panorama-section">
	<h5 id="panorama-title" class="center"><?php the_field('image_title');?></h5>
	<p>
		<?php the_field('image_description');?>
	</p>
	<div class="row" id="panorama">

"

	<img class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />



<?php
 if( have_rows('marker_details') ):
$i = 0;
		while ( have_rows('marker_details') ) : the_row();
$i++;?>

<button data-target="modal-<?php echo $i;?>" class="btn-floating modal-trigger" style="background: rgba(0,0,0,.8); position: absolute; left: <?php the_sub_field('left_position'); ?>%; top: <?php the_sub_field('top_position'); ?>%;"><i class="material-icons">add</i></button>

<div id="modal-<?php echo $i;?>" class="modal">
		<div class="modal-content">
			<p><?php the_sub_field('marker_text');?>

			<a class="chip blue lighten-2 white-text" href="https://twitter.com/intent/tweet?url=<?php echo wp_get_shortlink(); ?>&via=<?php echo get_theme_mod( 'tcx_twitter_handle' );?>&text=<?php the_sub_field('marker_text');?>" aria-label="Click to share on Twitter" title="Share on Twitter" target="_blank">Share this on twitter</a>
			</p>
		</div>
		<div class="modal-footer">
			<a href="#panorama" class="modal-action modal-close waves-effect btn-flat">Close</a>
		</div>
	</div>

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

<aside id="child-wrapper" class="row">
<?php
		while ( have_rows('child_pages') ) : the_row();
		$img = get_sub_field('subpage_image');
		$section_title = get_sub_field('section_title');
		?>
		<div id="<?php echo $section_title; ?>" class="col s12 l4 child-pages-sections center"  >
			<div class="col s10 offset-s1" style="padding: 1rem; background: <?php the_sub_field('background_colour'); ?>; ">
			<div class="" style="color: <?php the_sub_field('text_colour'); ?>;">
				<h2 class="h5"><?php the_sub_field('section_title'); ?></h4>

					<img src="<?php echo $img; ?>" alt="<?php echo $section_title; ?> representative image">
			</div>
			<div class="col s12">
				<a class="btn transparent z-depth-0 waves-effect" style="color: <?php the_sub_field('text_colour'); ?>;" href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('button_text'); ?></a>
			</div>
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
