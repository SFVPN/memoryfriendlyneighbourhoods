<?php
$title = single_cat_title("", false);
?>
<div id="sidebar1" class="col s12 m3 l3" role="complementary">
	<div class="search-related grey lighten-5">

		<?php
		if (is_singular('post')) {
			the_post_thumbnail('large', array('class' => 'hide-on-med-and-down responsive-img'));
			$authors = get_field('authors');
			if ($authors){
				echo '<h3 class="search-title center">Authors</h3>';
			}
			foreach ($authors as $author){
				um_fetch_user($author[ID]);
						$fn =  $author['user_firstname'];
						$ln = $author['user_lastname'];
						echo '<p class="chip white center"><a href="profile/' . strtolower($fn) . '-' . strtolower($ln) . '">' . $fn . ' ' . $ln . '</a></p>';
			}
				// echo get_the_term_list( $post->ID,'category','',', '); // category will be changed to whatever the resource taxonomy is
				?>
			<h3 class="side-title center">Category</h3>
			<p class="center">
			<?php echo get_the_term_list( $post->ID,'category','',', ');?>
		</p>

			<h3 class="side-title center">Date</h3>
			<p class="center"><i class="mdi mdi-clock"></i>
			<?php echo the_time('F j, Y');?>
		</p>
<?php
		} else {

		// args
		if(! empty( $title )) {

		$args = array(
			'meta_key' => 'expertise', // expertise options and categories must be the same for this not to break
			'meta_value' => '', // matching the category title to its equivalent expertise field value
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
			echo '<h3 class="side-title center">Need an expert?</h3>';
			foreach ( $user_query->results as $user ) {
			um_fetch_user( $user->ID );
					echo '<p class="chip white center"><a class="" href="/mfn/profile/' . strtolower($user->first_name) . '-' . strtolower($user->last_name) . '">' . um_get_display_name( $user->ID ) . '</a></p>';
			}
		}
		}

		// aaaaaand reset ...
		wp_reset_query();

		echo '<h3 class="search-title center">Search resources</h3>';
	//	$my_search->the_form();
			echo do_shortcode( '[searchandfilter taxonomies="resource-category,category" show_count="1,1" types="checkbox,checkbox" headings="Categories,Types" hide_empty="0,0"]' );
		} ?>

	</div>


</div>
