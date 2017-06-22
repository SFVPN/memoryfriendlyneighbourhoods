<section id="post-home" class="col s12 center" itemscope itemtype="http://schema.org/WebPage">
	<div class="row">
		<header class="home-header overlay" data-intro='This is the home page title' >
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

		<div class="home-entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		</div>
		<div class="fixed-action-btn">
<a class="btn btn-large btn-floating" href="javascript:void(0);" onclick="javascript:introJs().start();"><i class="material-icons">help</i></a>
</div>
	</div>




</section> <!-- end article -->
