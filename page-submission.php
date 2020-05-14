<?php
/*
Template Name: Submit Content
*/


get_header();

?>

<main class="row">


	<section class="row" itemscope itemtype="http://schema.org/WebPage">


			<header class="resources-article-header col s12 center">


				<h1 class="page-title"><?php the_title(); ?></h1>
				<span id="excerpt"><?php the_excerpt(); ?></span>


			</header> <!-- end article header -->


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php //get_template_part( 'parts/loop', 'page' ); ?>

						<div class="entry-content col s12">
						<?php

						the_content();


						endwhile; endif;

						?>


		    <?php // get_sidebar(); ?>

</div>

	</section>
</main> <!-- end main -->


<?php get_footer(); ?>
