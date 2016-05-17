<div class="col s12">
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_option('home')?>"> Home</a>
	<?php if($post->post_parent){?>
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_the_permalink($post->post_parent); ?>"><?php echo ' ' . get_the_title($post->post_parent); ?></a>
	<?php }?>
	<?php if(is_page('profile')){?>
	<i class="grey-text mdi mdi-chevron-right"></i><a href="<?php echo get_permalink( get_page_by_path( 'Network' ) ) ?>"><?php echo ' ' . get_the_title(get_page_by_path( 'Network' )); ?></a>
	<?php }?>
	<i class="grey-text mdi mdi-chevron-right"></i><span> <?php the_title(); ?></span>
</div>
