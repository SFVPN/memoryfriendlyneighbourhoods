
<?php $backgroundImage = get_the_post_thumbnail_url(get_the_ID(),'full');?>
<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 center blue lighten-3"
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



		<?php
		global $current_user;
	 get_currentuserinfo();
	 // check if current user can edit posts or is the post author
		if(current_user_can('edit_posts') || $current_user->ID == $post->post_author)  {
			edit_post_link( __( 'Edit Page', 'textdomain' ), '<div class="fixed-action-btn">','</div>', null, 'btn btn-primary btn-edit-post-link' );
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

				$start_date = get_field('event_date_start');
				$end_date = get_field('event_date_end');
				if ($start_date) {
					echo '<p><strong>Event Date</strong> ' . $start_date;
					if($end_date) {
						echo ' to ' . $end_date;
					}
					echo '</p>';
				}

				the_content();

				if( have_rows('videos') ):
					 while ( have_rows('videos') ) : the_row();
					 echo '<div class="video-wrapper col s12">';
					 $video_title = get_sub_field('video_title');
					 $video_description = get_sub_field('video_description');
					 $video_link = get_sub_field('video_link');

					 if($video_title) {
						 echo '<h2 class="h5">' . $video_title . '</h2>';
					 }

					 if($video_description) {
						 echo $video_description;
					 }

					 echo '<div class="video-container">' . $video_link . '

					 </div>';

				 	echo '</div>';
					endwhile;
					endif;

				$video_alert_text = get_field('video_heading');
				if ($video_alert_text) {
					echo '<p>'
					. $video_alert_text .
					'</p>';
				}

				$video = get_field('video_url');

				if ($video){
					echo '<div class="video-container">' . $video . '

					</div>';
				}

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

 		   if( have_rows('useful_links') ):
 		  echo '<ul class="collection-links col s12 grey lighten-4 "><h2 class="h5">Useful Links</h3>';
 		  		while ( have_rows('useful_links') ) : the_row();
 		  		$text = get_sub_field('link_text');
 		  		$link = get_sub_field('link_url');
 		  		?>


		 <li class="link-item">
			 <a href="<?php echo $link; ?>"><?php echo $text; ?></a>
		 </li>



 		  	<?php
 		  	 endwhile;
 		  	 echo '</ul>';
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
