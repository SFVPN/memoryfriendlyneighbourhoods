<?php
get_header(); ?>
<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php
				  $children = get_pages('title_li=&child_of='.$post->ID.'&='.$post->ID.'&echo=0');
				  if ($children) {
							get_template_part( 'parts/loop', 'child-pages' );
					} else {
						get_template_part( 'parts/loop', 'page' );
					}
					endwhile; endif;
				?>

	</main> <!-- end main -->

	<?php 	if ( !um_is_on_edit_profile() ) {
		get_template_part( 'parts/content', 'member-contributions' );
	}?>



<?php get_footer(); ?>
