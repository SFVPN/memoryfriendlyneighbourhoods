<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown
	?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card grey-text text-darken-2'); ?> role="article">
	<section class="card-content">
		<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
										echo '<span class="badge new"></span>';
								}?>
		<h5 class="grey-text text-darken-2"><?php echo $post->post_title; ?></h5>



		<!-- This is where we'll have conditionals testing whether it's a video, link, document etc to either link externally or through to single.php -->
		<div class="grey-text card-action">

				<?php

				echo '<p class="intro">' . $post->post_content . '</p>';?>

		<?php	if ( in_category( 'writing' )) {?>

			<a href="#" class="btn materialize-red lighten-2 tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this link <i class="mdi mdi-open-in-new" > </i></a>

<?php } elseif ( in_category( 'video') ) {?>

			<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this video <i class="grey-text mdi mdi-video" > </i></a>

<?php } else {?>

			<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this video <i class="grey-text mdi mdi-video" > </i></a>

<?php }
?>
<span class="card-title badge grey-text "><?php echo the_time('F j, Y');?></span>
		</div>





				</div>

	</section>


</article>
<?php //}?>
