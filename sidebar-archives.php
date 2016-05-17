<?php
$title = single_cat_title("", false);
?>
<div id="sidebar1" class="col s12 m3 l3" role="complementary">
	<div class="search-related grey lighten-5">

<?php

		// args
		if(( $title )) {

		$args = array(
			'meta_key' => 'expertise', // expertise options and categories must be the same for this not to break
			'meta_value' => $title, // matching the category title to its equivalent expertise field value
			'meta_compare' => 'LIKE',
			'orderby' => 'post_count', // ordering by highest post count
			'order' => 'DESC',
			'number' => 5 // only getting 5 members

		);
		// The Query
		$user_query = new WP_User_Query( $args );
	//	um_user('profile_photo'); get profile photo after um_fetch_user

		// User Loop
		if ( ! empty( $user_query->results ) ) {
			echo '<h3 class="side-title center">Need a ' . $title .' expert?</h3>';
			foreach ( $user_query->results as $user ) {
			//print_r($user);
			um_fetch_user( $user->ID );
					echo '<p class="chip center white"><a class="" href="/profile/' . $user->user_nicename . '">' . um_get_display_name( $user->ID ) . '</a></p>';
			}
		}
	}

		// aaaaaand reset ...
		wp_reset_query();

		echo '<h3 class="search-title center">Search resources</h3>';
		//$my_search->the_form();
		echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );

		 ?>

	</div>


</div>
