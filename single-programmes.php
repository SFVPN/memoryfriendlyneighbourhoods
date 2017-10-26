<?php
get_header(); ?>
<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php

							get_template_part( 'parts/loop', 'child-pages' );

					endwhile; endif;
				?>

	</main> <!-- end main -->

<section class="panorama-section">
	<h5 class="center"><?php the_field('image_title');?></h5>
	<p>
		<?php the_field('image_description');?>
	</p>
	<div class="row" id="panorama">


<?php

$image = get_field('panorama_image');

if( !empty($image) ): ?>

	<img class="responsive-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>

<?php
 if( have_rows('marker_details') ):

		while ( have_rows('marker_details') ) : the_row();?>

		<span class="tooltipped" data-position="<?php the_sub_field('text_position'); ?>" data-delay="50" data-tooltip="<?php the_sub_field('marker_text'); ?>" style="position: absolute; left: <?php the_sub_field('left_position'); ?>%; top: <?php the_sub_field('top_position'); ?>%;"></span>


	<?php
	 endwhile;
	 else :
			 // no rows found
	 endif;
 ?>



</div>

</section>

<?php get_footer(); ?>
