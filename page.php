<?php
get_header(); ?>



	<main class="container">
			<div class="row" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
				  $children = get_pages('title_li=&child_of='.$post->ID.'&echo=0');
				  if ($children) {
							get_template_part( 'parts/loop', 'page-about' );
					} else {
						get_template_part( 'parts/loop', 'page' );
					}
					?>

					<?php //get_template_part( 'parts/loop', 'page-about' ); ?>


				<?php endwhile; endif; ?>


		</div> <!-- end #main -->

			<?php // get_sidebar(); ?>

	</main> <!-- end main -->



<?php get_footer(); ?>
