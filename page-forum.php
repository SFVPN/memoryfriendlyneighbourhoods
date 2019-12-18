<?php

/**
 * Template Name: Forum
 * Template Post Type: programmes
 */

 add_filter( 'document_title_parts', function( $title_parts_array ) {
 		$id = get_the_ID();
 	 $parent = get_post_ancestors( $id );

 				$title_parts_array['title'] = get_the_title($id) . ' - ' . get_the_title($parent[0]);
 		//}
 		return $title_parts_array;
 } );

get_header(); ?>

<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main id="forum" class="row" role="main">

		<?php $backgroundImage = get_the_post_thumbnail_url($post->ID,'full');?>
		<header class="<?php echo $post->post_name;?> forum-header col s12 center"
			<?php if ($backgroundImage) {?>
				style="background:
				  linear-gradient(
		      rgba(255, 255, 255, 0.65),
		      rgba(255, 255, 255, 0.65)
		    ),
				url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>) no-repeat; background-size: cover;"
			<?php } ?>
			>
			<h1 class="page-title light"><?php the_title(); ?></h1>
      <?php $excerpt = get_the_excerpt();
      if(has_excerpt()) {
        echo '<p id="excerpt">' . get_the_excerpt() . '</p>';
      }?>

		</header> <!-- end article header -->
<div class="container">
			<?php
        if (have_posts()) : while (have_posts()) : the_post();
          $programme_forum = get_pages( array( 'child_of' => $post->ID, 'post_type' => 'programmes', 'sort_column' => 'post_title', 'sort_order' => 'asc' ) );

          if ($programme_forum) {
          echo '<div class="programme-forum col s12">';
          foreach( $programme_forum as $page ) {


          ?>
    <a href="<?php echo get_permalink( $page->ID ); ?>">
      <article class="col s12 m6 l4">
        <div class="col s12">

  			<h2 class="light"><?php echo $page->post_title; ?></h2>
  	     </div>

  		</article>
    </a>
<?php
    }
    echo '</div>';
	} else {
    get_template_part( 'parts/content', 'forum' );
	}

  endwhile; endif;
?>
</div>

	</main> <!-- end main -->




<?php get_footer(); ?>
