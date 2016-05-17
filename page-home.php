<?php
/*
Template Name: Home Page
*/

get_header(); ?>


<main class="container">

		<div class="row" role="main">

			<?php get_template_part( 'parts/loop', 'page-home' ); ?>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php // the_content(); ?>


				<?php endwhile; endif; ?>
				<?php $alert = get_field('alert_text');
				if ($alert){?>
					<div class="fixed-action-btn" role="aside">
						<div class="card-panel white">

								<a href="<?php the_field('alert_link'); ?>" class=" waves-effect" data-position="left" data-delay="50" data-tooltip="<?php echo $alert; ?>"><i class="mdi mdi-bell-ring-outline"></i> <?php echo $alert; ?></a>

						</div>
					</div>
				<?php }?>

			</div> <!-- end #main -->

	<?php // get_sidebar(); ?>

</main> <!-- end main -->

<div class="row center">
	<div class="col s12">
		<a href="#gettingStarted" class="waves-effect btn-large waves-circle waves-light btn-floating"><i class="mdi mdi-chevron-down"></i></a>
	</div>
</div>
<div id="gettingStarted" class="row blue-grey darken-2">

	<div class="col s12 center white-text">
		<?php the_field('heads_up'); ?>
	</div>
	<div class="col s6 center" role="aside">
		<a href="<?php echo get_permalink( get_page_by_path( 'Register' ) ) ?>" style="font-size: 2rem; margin: 1em;" class="col s10 push-s1 btn-large">Join the network</a>
	</div>
	<div class="col s6 center" role="aside">
		<a href="<?php echo get_permalink( get_page_by_path( 'Add Resource' ) ) ?>" style="font-size: 2rem; margin: 1em;" class="col s10 btn-large">Add a resource</a>
	</div>

</div>










<?php get_footer(); ?>
