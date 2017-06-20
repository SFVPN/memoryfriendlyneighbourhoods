<?php

/*
Template Name: Network Page
*/
get_header();

?>
<?php // get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post();

						get_template_part( 'parts/loop', 'page-network' );

					endwhile; endif;
				?>



	</main> <!-- end main -->

	<?php 	if ( !um_is_on_edit_profile() ) {
		get_template_part( 'parts/content', 'member-contributions' );
	}?>



<?php get_footer(); ?>
