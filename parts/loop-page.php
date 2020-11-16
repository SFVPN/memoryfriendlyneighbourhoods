<section class="<?php echo $post->post_name;?> container" itemscope itemtype="http://schema.org/WebPage">
	<header class="article-header col s12 center">


		<h1 class="page-title"><?php the_title(); ?></h1>
		<span id="excerpt"><?php the_excerpt(); ?></span>

		<? //var_dump($post);?>


	</header> <!-- end article header -->




    <section id="About-<?php echo $post->post_name;?>" class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			 ?>

			 <?php if(is_page('resource-submission-thank-you')) {
	 			$page = get_field('add_resource', 'option');?>
	 			<a class="amber btn-flat lighten-1 black-text" href="<?php echo get_permalink($page);?>">
	 		 <i class="material-icons left">add_circle_outline</i><span class=""><?php echo get_the_title($page);?></span></a>
	 		<?php }?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer center">

	</footer> <!-- end article footer -->



</section> <!-- end article -->
