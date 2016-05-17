<?php //if(  has_term( 'writing', 'category' ) ) { - this will be to output different styles depending on whether a video etc is being shown ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card grey-text text-darken-2'); ?> role="article">
	<section class="card-content">
		<?php if( strtotime( $post->post_date ) > strtotime('-8 day') ) {
										echo '<span class="badge new"></span>';
								}?>
		<h5 class="grey-text text-darken-2"><?php the_title(); ?></h5>



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
		</div>

				<div id="byline" class="row card-action">

					<div class="col s6">
						<h6 class="card-sub-title">Authors <i class="grey-text tooltipped mdi mdi-help-circle" data-position="right" data-delay="50" data-tooltip="This shows the resource authors"> </i></h6>

						<?php $authors = get_field('participants');
						if($authors) {
						foreach ($authors as $author){

							echo '<p><a href="/profile/' . strtolower($author['user_nicename']) . '">' . $author['user_firstname'] . ' ' . $author['user_lastname'] . ' </a></p>';
						}}?>

					</div>
					<div class="col s6">
				<h6 class="card-sub-title">Areas of interest <i class="grey-text tooltipped mdi mdi-help-circle" data-position="right" data-delay="50" data-tooltip="Click on the links below to view related resources"> </i></h6>

						<?php

						if(!is_single()){

							echo get_the_term_list( $post->ID,'resource-category', '<p>', '</p><p>', '</p>');

						} else {
							echo get_the_term_list( $post->ID,'resource-category','',', '); // category will be changed to whatever the resource taxonomy is
						}
						?>

						<span class="card-title badge grey-text "><?php echo the_time('F j, Y');?></span>



					</div>



				</div>

	</section>

	<?php get_template_part( 'parts/content', 'share' ); ?>

</article>
<?php //}?>
