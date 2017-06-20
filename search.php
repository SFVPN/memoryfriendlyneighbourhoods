<?php get_header(); ?>





			<main class="row" role="main">
				<header class="article-header col s12 grey lighten-2 center">
					<h1 class="page-title center"><?php echo esc_attr(get_search_query()); ?></h1>

					<?php

					echo do_shortcode( '[searchandfilter taxonomies="search" types="," headings="," post_types="resources" hide_empty="0,0" search_placeholder="enter your search term here ..."]' );
					global $wp_query;
					$total_results = $wp_query->found_posts;
					if ($total_results == 1) {
						echo '<span id="excerpt"><p><span class="count">' . $total_results . '</span> search result</p></span>';
					} else {
						echo '<span id="excerpt"><p><span class="count">' . $total_results . '</span> search results</p></span>';
					}



					?>

				</header>
				 <section class="archive-container col s12">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- To see additional archive styles, visit the /parts directory -->
					<?php get_template_part( 'parts/loop', 'blog' ); ?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

			    <?php endif; ?>
				</section>
		    </main> <!-- end #main -->

		    <?php get_sidebar('archives'); ?>




<?php get_footer(); ?>
