<?php

get_header(); ?>

<main class="row" role="main">



		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>


					<?php if( is_singular('resources') ) { ?>
					<ul id="post-nav" class="row" role="navigation">
						<?php next_post_link('<li class="truncate inline-block btn-flat grey lighten-4 btn-large right prev-next-post-nav"> %link</li>', '<strong>Next article:</strong> %title',TRUE, ' ', 'resource-category' ); ?>
						<?php previous_post_link('<li class="truncate inline-block btn-flat grey lighten-4 white btn-large left prev-next-post-nav">%link </li>', '<strong>Previous article:</strong> %title',TRUE, ' ', 'resource-category' ); ?>
					</ul>


					<?php } ?>

	<?php endwhile; ?>

	<?php endif; ?>


</main> <!-- end main -->

<?php get_footer(); ?>
