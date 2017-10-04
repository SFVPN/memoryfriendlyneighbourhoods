<?php
/*
Template Name: Network Home Page
*/

get_header(); ?>


<main class="row" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'home-network' );

				endwhile; endif;
			?>

			<?php
			 if( have_rows('front_page_sections') ):

					while ( have_rows('front_page_sections') ) : the_row();?>
					<div id="<?php the_sub_field('section_title'); ?>" class="row network-home-sections center" style="background: <?php the_sub_field('background_colour'); ?>;"  >
						<div class="col s12 l8 push-l<?php the_sub_field('push_right'); ?>" style="color: <?php the_sub_field('text_colour'); ?>;">
							<h4><?php the_sub_field('section_title'); ?></h4>
								<?php the_sub_field('section_description'); ?>

						</div>

						<div class="col s12 l4 pull-l<?php the_sub_field('pull_left'); ?>" >
								<img src="<?php the_sub_field('section_image'); ?>">
						</div>
						<div class="col s12">
							<a class="btn-large transparent z-depth-0 waves-effect" style="color: <?php the_sub_field('text_colour'); ?>;" href="<?php the_sub_field('page_link'); ?>"><?php the_sub_field('button_text'); ?></a>
						</div>

					</div>

				<?php
				 endwhile;
				 else :
						 // no rows found
				 endif;
			 ?>


</main>

<script>
function startIntro(){
	var intro = introJs();
		intro.setOptions({
			steps: [
				{
					element: document.querySelector('#menu-item-28'),
					intro: "This is a tooltip."
				},
				{
					element: document.querySelector('#menu-item-29'),
					intro: "This is a tooltip."
				},
				{
					element: document.querySelector('#menu-item-37'),
					intro: "This is a tooltip."
				},

			]
		});
		intro.start();
}
</script>

<?php get_footer(); ?>
