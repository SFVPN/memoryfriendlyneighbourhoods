<section id="post-home" class="col s12 center" itemscope itemtype="http://schema.org/WebPage">
	<div class="row">
		<header class="home-header overlay" >
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

		<div class="home-entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		</div>
		<?php $help = get_field('help', 'option');
		if ($help) {?>
			<div class="fixed-action-btn hide-on-med-and-down">
	<a class="btn btn-large btn-floating" href="javascript:void(0);" onclick='javascript:introJs().setOption("overlayOpacity", 0.1).start();'><i class="material-icons">help</i></a>
	</div>
		<?php }?>

	</div>




</section> <!-- end article -->
