<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="article-header col s12 center">


		<h1 class="page-title"><?php the_title(); ?></h1>
		<span id="excerpt"><?php the_excerpt(); ?></span>

		<? //var_dump($post);?>

		<div class="row center">
			<a href="#About-<?php echo $post->post_name;?>" class=" btn-flat btn-floating btn-large"><i class="large material-icons">keyboard_arrow_down</i></a>
		</div>
	</header> <!-- end article header -->




    <section id="About-<?php echo $post->post_name;?>" class="entry-content col s12" itemprop="articleBody">
			<div id="settings" class="modl">
			<div class="modal-content">
			<div class="changes text-black">
				<?php the_content();?>

			<label class="form_label" for="styleSwitcher">Choose your style</label>
			<form  id="styleSwitcher">
			<input type="radio" name="style" id="normal" value="normal" checked>
			<label for="normal">Normal</label>
			<input type="radio" name="style" id="high-contrast" value="high-contrast">
			<label for="high-contrast">High Contrast</label>
			<input type="radio" name="style" id="noImages" value="noImages">
			<label for="noImages">No Images</label>
			</form>


			<label class="form_label" for="textSwitcher">Choose your text size</label>
			<form  id="textSwitcher">
			<input type="radio" name="text" id="normal-text" value="normal-text" checked>
			<label for="normal-text">Normal</label>
			<input type="radio" name="text" id="medium" value="medium">
			<label for="medium">Medium</label>
			<input type="radio" name="text" id="large" value="large">
			<label for="large">Large</label>
			</form>

			</div>
			</div>

			</div>


	</section> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->



</section> <!-- end article -->
