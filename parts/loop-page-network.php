<section class="<?php echo $post->post_name;?> nyr" itemscope itemtype="http://schema.org/WebPage">
	<header class="<?php echo $post->post_name;?> article-header col s12 grey lighten-2 center">


		<h1 class="page-title"><?php the_title(); ?></h1>


			<?php
			$role = get_field('network_role');
			$count = count( get_users( array( 'role' => $role ) ) );

			echo '<span id="excerpt"><p><span class="count">' . $count . '</span> members and counting</p></span>'  ;

			?></span>
		<? //var_dump($post);?>


	</header> <!-- end article header -->




    <section class="entry-content col s12" itemprop="articleBody">
	    <?php the_content();

			 ?>

	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">


		</div>
	</footer> <!-- end article footer -->



</section> <!-- end article -->
