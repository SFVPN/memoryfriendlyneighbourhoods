<?php get_header();
//get_template_part( 'parts/content', 'breadcrumbs' );
$title = single_term_title("", false);
$slug = sanitize_title($title);
$term = get_queried_object();
?>

<main class="row" role="main">

					<header class="resources-article-header col s12 center">
						<h1 class="page-title center"><?php echo $title; ?></h1>

						<?php



						if ($term->count == 1) {
							echo '<span id="excerpt"><p><span class="count">' . $term->count . '</span> item</p></span>';
						} else {
							echo '<span id="excerpt"><p><span class="count">' . $term->count . '</span> items</p></span>';
						}



						?>
						<div class="center col s12" style="">

								<?php
								$res_categories = get_terms( array('taxonomy' => 'resource-category','hide_empty' => false,) );

								foreach( $res_categories as $key=>$value ) {
								?>

					

							<?php }
							?>

						</div>
					</header>

					 <section id="About-<?php echo $slug;?>" class="archive-container col s12">

			    <?php if (have_posts()) : while (have_posts()) : the_post();

					get_template_part( 'parts/loop', 'blog' );

					?>

					<?php endwhile; ?>

					<?php joints_page_navi(); ?>

					<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

					<?php endif; ?>

			</section>

			<?php get_sidebar('archives'); ?>



</main> <!-- end main -->



<?php get_footer(); ?>
