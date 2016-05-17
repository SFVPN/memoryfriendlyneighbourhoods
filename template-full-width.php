<?php
/*
Template Name: Search
*/
?>

<?php get_header();

?>



<main class="container">

		<div class="row" role="main">

		    <div class="col s9" role="main">

					<header>
						<h1 class="page-title center"><?php echo ucwords( $_GET['tax_category'])  . ' Resources';?></h1>

					</header>

			    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php
					$my_search = new WP_Advanced_Search('my-form');
$query = $my_search->query();
if ( $query->have_posts() ):
	while ( $query->have_posts() ): $query->the_post();
			get_template_part( 'parts/loop', 'blog' );
	endwhile;
endif;

?>


				<?php endwhile; ?>

					<?php $my_search->pagination(array('prev_text' => '«','next_text' => '»')); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>
			</div>

				<?php get_sidebar('sidebar1'); ?>
			</div> <!-- end .row -->

		</main> <!-- end main -->



<?php get_footer(); ?>
