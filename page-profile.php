<?php
/*
Template Name: Profile Page
*/

get_header(); ?>
<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post();

						get_template_part( 'parts/loop', 'page-profile' );

					endwhile; endif;
				?>




	</main> <!-- end main -->
<div id="contributions" class="row grey lighten-3">
	<aside class="container">

			<?php 	if ( !um_is_on_edit_profile() ) {
				get_template_part( 'parts/content', 'member-contributions' );
			}?>

	</aside>
</div>




<?php get_footer(); ?>
