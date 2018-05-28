<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$title = single_cat_title("", false);
$term = get_queried_object();
?>

<main class="row" role="main">

					<header class="article-header col s12 grey lighten-2 center">
						<h1 class="page-title center"><?php echo $title; ?></h1>
						<?php

						echo do_shortcode( '[searchandfilter taxonomies="search" types="," headings="," post_types="resources" hide_empty="0,0" search_placeholder="enter your search term here ..."]' );

						if ($term->count == 1) {
							echo '<span id="excerpt"><p><span class="count">' . $term->count . '</span> resource</p></span>';
						} else {
							echo '<span id="excerpt"><p><span class="count">' . $term->count . '</span> resources</p></span>';
						}



						?>
					</header>

					 <section class="archive-container col s12">

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
