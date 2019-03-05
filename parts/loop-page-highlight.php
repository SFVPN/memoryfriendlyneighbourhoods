<div id="homeIntro" style="background: url(<?php the_field('highlights_image');?>) no-repeat; background-size: cover; background-position: center center;" class="col s12">
	<section id="post-home" class="col s12 center" itemscope itemtype="http://schema.org/WebPage">
		<div id="highlights" class="col s8 offset-s2">
			<header class="home-header overlay" >

				<h1 class="page-title"><?php the_field('highlights_header');?></h1>
			</header> <!-- end article header -->

			<div class="home-entry-content" itemprop="articleBody">
			<p>
				<?php the_field('highlights_text');?>
			</p>
			</div>
			<div class="col s12">
				<a class="btn-large z-depth-0 waves-effect" href="<?php the_field('highlights_link'); ?>"><?php the_field('highlights_button_text'); ?></a>
			</div>
		</div>

	</section> <!-- end article -->

	<a href="#us" class="waves-effect materialize-red lighten-2 btn waves-circle waves-light btn-floating pulse btn-large tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click here or scroll down the page for more information"><i class="material-icons">keyboard_arrow_down</i></a>
	
</div>
 <!-- end article -->
