<section class="<?php echo $post->post_name;?> row" itemscope itemtype="http://schema.org/WebPage">
	<header class="article-header col s12 center">


		<h1 class="page-title"><?php the_title(); ?></h1>
		<span id="excerpt"><?php the_excerpt(); ?></span>

		<? //var_dump($post);?>

	
	</header> <!-- end article header -->




    <section id="About-<?php echo $post->post_name;?>" class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			 ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
	</footer> <!-- end article footer -->



</section> <!-- end article -->
