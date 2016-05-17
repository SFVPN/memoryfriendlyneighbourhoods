<?php get_header();
$title = single_cat_title("", false);
?>



<main class="container">

		<div class="row" role="main">

		    <div class="col s9">

					<header>
						<h1 class="page-title center"><?php echo $title;?></h1>
					</header>
			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'blog' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>
			</div>

				<div class="col s3">
					<h1 class="page-title center">Members</h1>
					<?php

					// args


					$args = array(
						'meta_key' => 'expertise',
						'meta_value' => $title,
						'meta_compare' => 'LIKE',

					);
					// The Query
					$user_query = new WP_User_Query( $args );
				//	um_user('profile_photo'); get profile photo after um_fetch_user

					// User Loop
					if ( ! empty( $user_query->results ) ) {
						foreach ( $user_query->results as $user ) {
						um_fetch_user( $user->ID );
								echo '<div class="collection"><a class="collection-item" href="/mfn/profile/' . strtolower($user->first_name) . '-' . strtolower($user->last_name) . '">' . um_get_display_name( $user->ID ) . '</a></div>';
						}
					} else {
						echo 'No users found.';
					}
					?>

					<?php
					// aaaaaand reset ...
					wp_reset_query();
					?>
				</div>
			</div> <!-- end #main -->

		</main> <!-- end main -->


<?php get_footer(); ?>
