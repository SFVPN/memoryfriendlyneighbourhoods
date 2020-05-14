<!-- This adds some basic  functionality whereever the partial is included -->
<?php
$display_name = um_user('display_name');
$register = get_field('registration_page'); // for each network page, add the registration page as a post object field / return ID.
$page = get_field('add_resource', 'option');

 //echo $display_name; // prints the user's display name?>



		<?php if(is_tax() || is_post_type_archive( 'resources' ) || is_singular('resources')) {?>
			<div class="fixed-action-btn toolbar">
		     <a class="btn-floating btn-large amber">
		       <i class="large material-icons black-text">add</i>
		     </a>

			<ul id="resources-actions">
		<li class="waves-effect waves-light">
			<a class="amber black-text" href="#search_resources">
		 <i class="material-icons left">search</i><span class="">Search</span></a>
		</li>
		<li class="waves-effect waves-light">
			<a class="amber lighten-1 black-text" href="<?php echo get_permalink($page);?>">
		 <i class="material-icons left">add_circle_outline</i><span class=""><?php echo get_the_title($page);?></span></a>
		</li>
	</ul>
</div>
		<?php }?>
		<?php if(is_page_template('page-network.php')) {?>
			<div class="fixed-action-btn toolbar">
		     <a class="btn-floating btn-large deep-purple darken-2">
		       <i class="large material-icons">add</i>
		     </a>

			<ul id="network-actions">
			<li class="waves-effect waves-light">
					<a class="deep-purple darken-2" href="#search_network">
				 <i class="material-icons left">search</i><span class="">Search</span></a>
			</li>
		<li class="waves-effect waves-light">
			<a class="deep-purple" href="<?php echo get_permalink($register);?>">
		 <i class="material-icons left">people_outline</i><span class=""><?php echo get_the_title($register);?></span></a>
		</li>
		</ul>
	</div>
		<?php }?>
