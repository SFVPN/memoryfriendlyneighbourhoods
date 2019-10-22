
<?php $backgroundImage = get_the_post_thumbnail_url(get_the_ID(),'full');?>
<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 center grey lighten-3"
	<?php if ($backgroundImage) {?>
		style="background:
		  linear-gradient(
      rgba(255, 255, 255, 0.65),
      rgba(255, 255, 255, 0.65)
    ),
		url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>) no-repeat; background-size: cover;"
	<?php } ?>
	>


		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php $byline = get_field("byline");
		if ($byline) {?>
			<span id="excerpt" class="indigo white-text"><?php echo $byline; ?></span>
		<?php } ?>



		<?php $register = get_field("network_registration");
		if ($register) {?>
			<div id="excerpt" class="fixed-action-btn"><a class="btn-flat red white-text" href="<?php echo get_field("network_registration"); ?>">Join</a></div>
		<?php } ?>

		<?php $register = get_field("network_registration");
		if ($register) {?>
			<div id="excerpt" class="fixed-action-btn"><a class="btn-flat red white-text" href="<?php echo get_field("network_registration"); ?>">Join</a></div>
		<?php }
		if(is_user_logged_in() || current_user_can('editor'))  {
			$subID = get_field('submission_page', 'option');?>
			<div id="fixed-sub" class="fixed-action-btn"><a class="btn-floating red white-text" href="<?php echo get_permalink($subID); ?>"><i class="material-icons">add</i></a>
			<?php edit_post_link( __( '<i class="material-icons">mode_edit</i>', 'textdomain' ), '', '', null, 'btn-floating grey darken-3 btn-edit-post-link' );?>
			</div>

		<?php

	 }?>



	</header> <!-- end article header -->

    <div class="entry-content col s12" itemprop="articleBody">
			<div class="container">

				<?php $elevator_pitch = get_field('elevator_pitch');
				if ($elevator_pitch) {?>

				<div class="center">
					<?php $elevator_image = get_field('elevator_image');
					if ($elevator_image){?>
					<span class="grey lighten-3" style="display: inline-block; width: 200px; height: 200px; padding: 40px; border-radius: 50%;" ><img alt="" src="<?php echo $elevator_image;?>" /></span>
					<?php } ?>
					<p class="elevator_pitch"><?php echo $elevator_pitch;?></p>

				</div>

				<?php
				}

				$event_date = get_field('event_date');
				if ($event_date) {
					echo '<p>Event Date: '
					. $event_date .
					'</p>';
				}

				the_content();

				if( have_rows('attachments_files') ):
				echo '<div class="col s12 info grey-text darken-4">';
				 	// loop through the rows of data
				    while ( have_rows('attachments_files') ) : the_row();
							$file = get_sub_field('file_upload');
				        // display a sub field value

							echo '<div class="chip">
				    <i class="attachment material-icons">file_download</i><label>Event information: </label><a class="tooltipped" href="' . $file['url'] . '" target="_blank" data-position="right" data-delay="50" data-tooltip="This will download the named file in a new tab">' . $file['title'] . '</a>

				  </div>';

				    endwhile;
				echo '</div>';
				else :

				    // no rows found

				endif;

			$video_alert_text = get_field('video_heading');
			if ($video_alert_text) {
				echo '<p>'
				. $video_alert_text .
				'</p>';
			}

			 ?>
			 <?php $video = get_field('video_url');

		if ($video){
			echo '<div class="video-container">' . $video . '

			</div>';
		}
	 ?>

			 <?php
 		   if( have_rows('useful_links') ):
 		  echo '<div class="collection-links with-header"><h3 class="h5 collection-header light center">Useful Links</h3>';
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
		$page_url = get_sub_field('page_link');

		?>
		<div id="<?php echo $section_title; ?>" class="col s12 m6 l4 child-pages-sections center"  >
			<div class="col s10 offset-s1" style="padding: 1rem; background: <?php the_sub_field('background_colour'); ?>; ">
			<div class="" style="color: <?php the_sub_field('text_colour'); ?>;">
				<h2 class="h5"><?php the_sub_field('section_title'); ?></h4>

					<img src="<?php echo $img; ?>" alt="<?php echo $section_title; ?> representative image">
			</div>
			<div class="col s12">
				<a class="btn transparent z-depth-0 waves-effect" style="color: <?php the_sub_field('text_colour'); ?>;" href="<?php echo $page_url; ?>"><?php the_sub_field('button_text'); ?></a>
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
