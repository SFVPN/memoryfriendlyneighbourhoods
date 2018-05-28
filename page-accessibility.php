<?php

/*
Template Name: Accessibility Page
*/
get_header();

?>
<?php // get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'parts/loop', 'page-accessibility' );
								endwhile; endif;
							?>




	</main> <!-- end main -->




<?php get_footer(); ?>
