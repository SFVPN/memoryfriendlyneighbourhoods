
<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?> um-role-<?php echo um_user('role'); ?> " style="padding: 2rem;">

	<div class="um-form row">

		<?php do_action('um_profile_before_header', $args ); ?>

		<?php if ( um_is_on_edit_profile() ) { ?><form method="post" action=""><?php } ?>

			<?php do_action('um_profile_header_cover_area', $args ); ?>

			<?php do_action('um_profile_header', $args ); ?>

			<?php //do_action('um_profile_navbar', $args ); ?>

			<?php
			$skills = um_user('expertise');
			$country = um_user('country');
			$work = um_user('work');
			$show_email = um_user('show_email_true');
			$show_email = implode(', ', $show_email);
			$website = um_user('your_website');



				if($skills) {
					echo '<p class="grey-text center"><span class="profile-interest">Areas of interest: </span>';
					foreach ($skills as $skill) {
					echo ' <span><i class="tiny material-icons">check</i> ' . $skill . '</span>';
				}
					echo '</p>';
	 		}
		 if($show_email == "Yes"){
				echo '<p class="center"><a class="btn-flat waves-effect grey lighten-4 tooltipped" href="mailto:' . um_user('user_email') . '" data-position="right" data-delay="50" data-tooltip="This will open up a new email message" target="_blank"><i class="material-icons left">email</i>Email ' . um_user("first_name") . '</a></p>'; // returns the email of logged-in user
		 }
				$nav = $ultimatemember->profile->active_tab;
				$subnav = ( get_query_var('subnav') ) ? get_query_var('subnav') : 'default';

				print "<div class='um-profile-body $nav $nav-$subnav'><p>";
				echo um_user('description');

				// Custom hook to display tabbed content
				do_action("um_profile_content_{$nav}", $args);
				do_action("um_profile_content_{$nav}_{$subnav}", $args);

				if($website && !um_is_on_edit_profile()){
					echo '<p class=""><a class="tooltipped btn" href="' . $website . '" data-position="right" data-delay="20" data-tooltip="This will open up an external website" target="_blank">Read more about ' . um_user("first_name") . '</a></p>'; // returns the email of logged-in user
			 }

			print "</p></div>";

			?>

		<?php if ( um_is_on_edit_profile() ) { ?></form><?php } ?>



	</div>
