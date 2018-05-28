<div class="col s12 l6 child-pages-sections center" style="background: <?php the_field('tile_background'); ?>;"  >
	<div class="" style="color: <?php the_field('tile_text'); ?>;">
		<h4><?php the_title(); ?></h4>

			<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?> representative image">
	</div>
	<div class="col s12">
		<a class="btn-large transparent z-depth-0 waves-effect" style="color: <?php the_field('tile_text'); ?>;" href="<?php the_permalink(); ?>">View</a>
	</div>

</div>
