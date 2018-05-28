<div class="container <?php echo $post->post_name;?>" itemscope itemtype="http://schema.org/WebPage">



    <section class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			 ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
    
	</footer> <!-- end article footer -->



</div> <!-- end article -->
