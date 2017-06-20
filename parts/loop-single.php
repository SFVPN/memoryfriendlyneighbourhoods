<article id="post-<?php the_ID(); ?>" <?php post_class('grey-text row text-darken-4 z-depth-0'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="single-article-header row center">
		<h1 class="page-title center"><?php echo the_title(); ?></h1>
		<div>
			<span class="chip white">Date added: <?php echo the_time('F j, Y');?></span>
		</div>

		<div>
			<span class="chip white">Areas of interest:
				<?php
				echo get_the_term_list( $post->ID,'resource-category','',', ');
				?>
				</span>
		</div>


			<?php

			$authors = get_field('participants');
			$names = array();
			$author_nick = array();

			if($authors) {
				echo '<div><span class="chip white">Authors: ';
			foreach ($authors as $author){
				$last_name = get_user_meta( $author, 'last_name', true );
				$first_name = get_user_meta( $author, 'first_name', true );
				$nickname = get_user_meta( $author, 'nickname', true );

				if(is_array($author)) {

					$names[] = '<a href="/profile/' . $author[nickname] . '">' . $author[user_firstname] . ' ' . $author[user_lastname] . '</a>';

				} else {
					$names[] = '<a href="/profile/' . $nickname . '">' . $first_name . ' ' . $last_name . '</a>';
				}


				}

				echo implode (' + ', $names);
				echo '</span></div>';

			}?>
		</div>



		<div class="row center">

		</div>
	</header>

    <section class="entry-content col s12" itemprop="articleBody">
			<?php

// check if the repeater field has rows of data
if( have_rows('attachments') ):
echo '<div class="col s12 info grey-text darken-4">';
	// loop through the rows of data
		while ( have_rows('attachments') ) : the_row();
			$file = get_sub_field('file');
				// display a sub field value

			echo '<div class="chip">
		<i class="attachment material-icons">file_download</i><label>File to download: </label><a href="' . $file['url'] . '">' . $file['filename'] . '</a>

	</div>';

		endwhile;
echo '</div>';
else :

		// no rows found

endif;

?>
				<?php
				the_post_thumbnail('large', array('class' => 'hide-on-large-only responsive-img'));
				the_content(); ?>

				<?php $video = get_field('video');
					if($video) {
						echo '<div class="video-container">' . $video . '</div>';
					}

				?>


	<?php $link = get_field('external_link');
		if($link) {
			echo '<div><a class="btn-flat tooltipped grey lighten-2" data-position="right" data-delay="50" data-tooltip="Clicking on this button will open up a separate website in a new tab" target="_blank" href="' . $link . '"><i class="material-icons left">info</i>View more information about this resource</a></div>';
		}

	?>

	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->



	<?php //comments_template(); ?>

</article> <!-- end article -->
