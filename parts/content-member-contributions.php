<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

  <?php $profile_id = um_profile_id();
  wp_reset_postdata();
  $args = array(
  'posts_per_page'   => 4,
  'post_type' => 'resources',
  'meta_query' => array(
      array(
      'key' => 'participants', // name of custom field
      'value' => '"' . $profile_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
      'compare' => 'LIKE'
      )
    ),
      'orderby'       =>  'post_date',
      'order'         =>  'ASC'
  );

  $myposts = get_posts( $args );
  if($myposts){
    echo '<h3 class="profil-sub-title light center">Recent contributions</h3>';
    foreach ( $myposts as $post ) : setup_postdata( $post );
  ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grey-text row text-darken-4 card z-depth-0'); ?>>


		<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
				echo '<span class="badge new"></span>';
				}
		?>
		<div class="card-content col s12">
		<span class="">Posted: <?php echo the_time('F j, Y');?></span>

	  <h2 class=""><?php echo $post->post_title; ?></h2>


			<div class="authors col s6">

				<label class="card-sub-title">Authors <i class="grey-text tooltipped material-icons" data-position="right" data-delay="50" data-tooltip="This shows the resource authors">help</i></label>

					<?php
					$authors = get_field('participants');
					$names = array();
					$author_nick = array();

					if($authors) {

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
					}?>

			</div>
			<div class="col s6">
				<label class="card-sub-title">Areas of interest <i class="grey-text tooltipped material-icons" data-position="right" data-delay="50" data-tooltip="Click on the links below to view related resources">help</i></label>

						<?php

						if(!is_single()){

							echo get_the_term_list( $post->ID,'resource-category','',', ');

						}
						?>



			</div>
			<div class="col s12 info grey-text darken-4">
				<?php echo $post->post_content;?>
			</div>
			<?php

// check if the repeater field has rows of data
if( have_rows('attachments') ):
echo '<div class="col s12 info grey-text darken-4">';
 	// loop through the rows of data
    while ( have_rows('attachments') ) : the_row();
			$file = get_sub_field('file');
        // display a sub field value

			echo '<div class="chip">
    <i class="attachment material-icons">file_download</i><label>File to download: </label><a class="tooltipped" href="' . $file['url'] . '" target="_blank" data-position="right" data-delay="50" data-tooltip="This will download the named file in a new tab">' . $file['filename'] . '</a>

  </div>';

    endwhile;
echo '</div>';
else :

    // no rows found

endif;

if( have_rows('external_file') ):
echo '<div class="col s12 info grey-text darken-4">';
 	// loop through the rows of data
    while ( have_rows('external_file') ) : the_row();
			$fileLink = get_sub_field('file_link');
			$fileName = get_sub_field('file_link_name');
        // display a sub field value

			echo '<div class="chip">
    <i class="attachment material-icons">file_download</i><label>External File to download: </label><a class="tooltipped" href="' . $fileLink . '" target="_blank" data-position="right" data-delay="50" data-tooltip="This will download the named file in a new tab">' . $fileName . '</a>

  </div>';

    endwhile;
echo '</div>';
else :

    // no rows found

endif;


?>
<div class="col s12 link">

			<?php
			if ( in_category( 'writing' )) {
			?>

			<a href="<?php echo $post->guid;?>" class="btn-flat amber">View this link</a>

			<?php } elseif ( in_category( 'videos') ) {
			?>

			<a href="<?php echo $post->guid;?>" class="btn-flat amber"><i class="material-icons left">videocam</i>View this video</a>

			<?php } else {
			?>

			<a href="<?php echo $post->guid;?>" class="btn-flat amber"><i class="material-icons left">assignment</i>View more about this resource </a>

			<?php }
			?>
			</div>
			</div>

	</article>

  <?php
  endforeach;
  }
  wp_reset_postdata();
  ?>

	<?php //get_template_part( 'parts/content', 'share' ); ?>
