<div id="post-not-found" class="row hentry">
	<div class="col s12">
		<?php if ( is_search() ) : ?>

			<header class="search-article-header center">
				<h1 class="light"><?php _e("There is currently no content in this section", "jointstheme"); ?></h1>
			</header>

			<section class="entry-content">
				<p><?php _e("Try your search again.", "jointswp");?></p>
			</section>


		<?php else: ?>

			<header class="search-article-header center">
				<h1 class="light"><?php _e("There is currently no content in this section", "jointstheme"); ?></h1>
			</header>



		<?php endif; ?>
	</div>



</div>
