<?php

/**
 * Template Name: Blog
 * Template Post Type: programmes
 */

get_header(); ?>

<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

		<?php $backgroundImage = get_the_post_thumbnail_url($post->ID,'full');?>
		<header class="<?php echo $post->post_name;?> article-header col s12 center grey lighten-3"
			<?php if ($backgroundImage) {?>
				style="background:
				  linear-gradient(
		      rgba(255, 255, 255, 0.65),
		      rgba(255, 255, 255, 0.65)
		    ),
				url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>) no-repeat; background-size: cover;"
			<?php } ?>
			>
			<h1 class="page-title"><?php the_title(); ?></h1>

		</header> <!-- end article header -->
<div class="container">
			<?php
$programme_blog = get_pages( array( 'child_of' => $post->ID, 'post_type' => 'programmes', 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );

if ($programme_blog) {

foreach( $programme_blog as $page ) {


?>
    <article class="col s12 programme-blog">
			<h2 class="h5"><a href="<?php echo get_permalink( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
			<div id="byline" class="grey-text" role="contentinfo">
				<i class="mdi mdi-clock" aria-hidden="true"></i> Posted on

				<?php
				the_time('F j, Y');

				?>

			</div>
			<?php if($page->post_excerpt){
				echo '<p>' . $page->post_excerpt . '</p>';
			}

				if( strtotime( $page->post_date ) > strtotime('-7 day') ) {
						echo '<span class="new badge" aria-hidden="true"></span>';
				}

			?>
			<hr style="color: whitesmoke;" />
		</article>

<?php
    }

	} else {
	echo	'<div class="col s12 programme-blog">We are regularly adding content. Please check again soon.</div>';
	}
?>
</div>

	</main> <!-- end main -->

	<?php 	if ( !um_is_on_edit_profile() ) {
		get_template_part( 'parts/content', 'member-contributions' );
	}?>



<?php get_footer(); ?>
