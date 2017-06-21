<?php
$title = single_cat_title("", false);
$page = get_field('add_resource', 'option');
if (is_tax()){
?>

<div id="sidebar1" class="col s12 grey lighten-3" role="complementary">



	<?php

	if(( $title )) {
	$args = array(
		'meta_key' => 'expertise', // expertise options and categories must be the same for this not to break
		'meta_value' => $title, // matching the category title to its equivalent expertise field value
		'meta_compare' => 'LIKE',
		'orderby' => 'last_name', // ordering by highest post count
		'order' => 'DESC',
		'number' => 9 // getting max of 9 members
		);
			// The Query
		$user_query = new WP_User_Query( $args );
		//	um_user('profile_photo'); get profile photo after um_fetch_user
		// User Loop
		if ( ! empty( $user_query->results ) ) {
			echo '<h3 class="side-title center">Find a ' . $title .' expert in our network</h3>';
			foreach ( $user_query->results as $user ) {
				um_fetch_user( $user->ID );
				$avatar_uri = um_get_avatar_uri( um_profile('profile_photo'), 80 );
				if ($avatar_uri) {
					echo '<div class="col s12 m6 l4 expert center"><img class="circle" src="' . $avatar_uri . '" /><a class="chip z-depth-0 waves-effect waves-light center" href="/profile/' . $user->user_nicename . '">' . um_get_display_name( $user->ID ) . '</a></div>';
				} else {
					$default_uri = um_get_default_avatar_uri();
					echo '<div class="col s12 m6 l4 expert center"><img class="circle default_avatar" src="' . $default_uri . '" /><a class="chip z-depth-0 waves-effect waves-light center" href="/profile/' . $user->user_nicename . '">' . um_get_display_name( $user->ID ) . '</a></div>';
				}

				}
			}
		}

		wp_reset_query();?>


</div>



<?php }?>


<div id="search_resources" class="modal bottom-sheet">
		<div class="modal-content">

<?php
echo '<div role="search"><h3 class="search-title center">Search resources <i class="left tooltipped material-icons" data-position="right" data-delay="50" data-tooltip="Search by keyword in the text box below, or choose one of the resource categories or types to narrow your focus">help_outline</i> </h3>';
//$my_search->the_form();
echo do_shortcode( '[searchandfilter taxonomies="search,resource-category,category" show_count="1,1" types=",checkbox,checkbox" headings=",Categories,Types" post_types="resources" hide_empty="0,0" submit_label="Click to Search Resources"]' );
echo '</div>';
 ?>
</div>
<div class="modal-footer">
<a href="#!" class="modal-action modal-close waves-effect waves-red white-text btn-flat materialize-red lighten-2">CLOSE</a>
</div>
</div>
