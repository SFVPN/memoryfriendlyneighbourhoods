<?php get_header(); ?>

	<div class="container">

		<div id="inner-content" class="row">

			<main id="main" class="col s12" role="main">

				<article id="content-not-found">

					<header class="article-header center">
						<h1><?php _e("Whoops!", "jointswp"); ?></h1>
					</header> <!-- end article header -->

					<section class="entry-content">
						<p><?php _e("The page you were looking for was not found.	", "jointswp"); ?></p>
						<p><?php _e("You can navigate to the main areas of the website please use the links below.", "jointswp"); ?></p>


						<?php joints_top_nav(); ?>
					
					</section> <!-- end article section -->


				</article> <!-- end article -->

			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
