<!-- This adds some basic  functionality whereever the partial is included -->
<?php
$display_name = um_user('display_name');
$register = get_field('join_network', 'option');
$page = get_field('add_resource', 'option');

 //echo $display_name; // prints the user's display name?>



	<div class="fixed-action-btn toolbar">
     <a class="btn-floating btn-large grey darken-3">
       <i class="large material-icons">mode_edit</i>
     </a>

		<ul>

		<?php if($post->post_parent){?>
		<!-- <li class="">
		<a class="" href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a>
	</li> -->
		<?php }?>
		<?php if(is_page('profile')){?>
		<li><a href="<?php echo get_permalink( get_page_by_path( 'Network' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'Network' )); ?></a></li>
		<?php }?>
		<?php if(!is_tax() && !is_category() && !is_page('profile') && !is_post_type_archive( 'resources' ) && !is_front_page()) {?>
		<li><?php echo 'You are viewing the following page: ' . get_the_title(); ?></li>
		<?php }?>

		<?php if(is_tax() && !is_category()){
		$title = single_cat_title("", false);
		?>
		<li><?php echo 'You are viewing the following resources: ' . $title; ?></li>
		<?php }?>
		<?php if(is_category() && !is_tax()){
		$title = single_cat_title("", false);
		?>
		<li> <?php echo 'You are viewing the network ' . $title; ?></li>
		<?php }?>
		<?php if(is_category() && is_tax()){
		$title = single_cat_title("", false);
		?>
		<li> <?php echo 'You are viewing the network ' . $title; ?></li>
		<?php }?>
	</ul>
	<ul class="right">
		<?php if(is_tax() || is_post_type_archive( 'resources' )){?>
		<li>
			<a class="btn-flat" href="#search_resources">
		 <i class="material-icons left">search</i><span class="">Advanced Search</span></a>
		</li>
		<li>
			<a class="btn-flat" href="<?php echo get_permalink($page);?>">
		 <i class="material-icons left">add_circle_outline</i><span class=""><?php echo get_the_title($page);?></span></a>
		</li>
		<?php }?>
		<?php if(is_page('network') || is_page('profile')){?>
		<li>
			<a class="btn-flat" href="<?php echo get_permalink($register);?>">
		 <i class="material-icons left">add_circle_outline</i><span class=""><?php echo get_the_title($register);?></span></a>
		</li>
		<?php }?>

	</ul>


	</div>
