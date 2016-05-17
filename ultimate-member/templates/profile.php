<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> ">

	<div class="um-form row">

		<?php do_action('um_profile_before_header', $args ); ?>

		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>

			<?php do_action('um_profile_header_cover_area', $args ); ?>

			<?php do_action('um_profile_header', $args ); ?>

			<?php do_action('um_profile_navbar', $args ); ?>

			<?php
			$skills = um_user('expertise');
			$country = um_user('country');
			$work = um_user('work');
			$show_email = um_user('show_email');
			$website = um_user('your_website');

			if($country) {
				echo '<p class="center"><span class="grey-text"><i class="mdi mdi-map-marker"></i> ' . $country . '</span></p>';
	}
	if($work) {
		echo '<p class="center"><span class="grey-text">' . $work . '</span></p>';
}
			if($skills) {
				 echo '<p class="grey-text center"><span class="profile-interest">Areas of interest </span>';
				 foreach ($skills as $skill) {
					 echo ' <i class="mdi mdi-check"></i> ' . $skill;
				 }
				 echo '</p>';
	 }
	 if($show_email){
			echo '<p class="center"><a class="btn tooltipped" href="mailto:' . um_user('user_email') . '" data-position="top" data-delay="50" data-tooltip="This will open up a new email message" target="_blank"><i class="mdi mdi-email left"></i>Email ' . um_user("first_name") . '</a></p>'; // returns the email of logged-in user
	 }
			$nav = $ultimatemember->profile->active_tab;
			$subnav = ( get_query_var('subnav') ) ? get_query_var('subnav') : 'default';

			print "<div class='um-profile-body $nav $nav-$subnav'>";

				// Custom hook to display tabbed content
				do_action("um_profile_content_{$nav}", $args);
				do_action("um_profile_content_{$nav}_{$subnav}", $args);

				if($website && !um_is_on_edit_profile()){
					echo '<p class=""><a class="tooltipped btn" href="' . $website . '" data-position="right" data-delay="20" data-tooltip="This will open up an external website" target="_blank">Read more about ' . um_user("first_name") . '</a></p>'; // returns the email of logged-in user
			 }

			print "</div>";

			?>

		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>

	</div>
	<?php 	if ( !um_is_on_edit_profile() ) {?>
	<div id="member-posts" class="row" role="aside">
		<?php $profile_id = um_profile_id();
		wp_reset_postdata();
		$args = array(
		'posts_per_page'   => 4,
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

	// get his posts 'ASC'

	$myposts = get_posts( $args );
	if($myposts){

	echo '<p class="profile-sub-title">Recent contributions</p>';
	foreach ( $myposts as $post ) : setup_postdata( $post );?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('card lime lighten-5 z-depth-0'); ?> role="article">
	<section class="card-content">
		<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
										echo '<span class="badge new"></span>';
								}?>
		<h5 class="grey-text text-darken-2"><?php echo $post->post_title; ?></h5>



		<!-- This is where we'll have conditionals testing whether it's a video, link, document etc to either link externally or through to single.php -->
		<div class="card-action">

				<?php

				echo '<p class="intro">' . $post->post_content . '</p>';?>

				<?php	if ( in_category( 'writing' )) {?>

					<a href="#" class="btn materialize-red lighten-2 tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this link <i class="mdi mdi-open-in-new" > </i></a>

				<?php } elseif ( in_category( 'video') ) {?>

					<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this video <i class="grey-text mdi mdi-video" > </i></a>

				<?php } else {?>

					<a href="<?php echo $post->guid ;?>" class="tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">Read more about this resource <i class="grey-text mdi mdi-video" > </i></a>

				<?php }
				?>
	<span class="card-title badge grey-text "><?php echo the_time('F j, Y');?></span>
		</div>





	</section>


	</article>

	<?php endforeach;
	}
	wp_reset_postdata();?>
	<?php }?>


</div>
