<?php get_header();
$title = single_cat_title("", false);
?>

<main class="row">

	<section>

		<header class="article-header col s12 grey lighten-2 center">


			<h1 class="page-title">Resources</h1>

			<div class="row center" style="padding: 3rem;">
				<a href="#network" class="waves-effect teal lighten-2 btn-large waves-circle waves-light btn-floating"><i class="material-icons">keyboard_arrow_down</i></a>
			</div>
		</header> <!-- end article header -->

		<div class="row">

				<?php
				$res_categories = get_terms( array('taxonomy' => 'resource-category','hide_empty' => false,) );

				foreach( $res_categories as $key=>$value ) {
				?>

			<div id="cat-<?php echo $key;?>" style="padding: 2em;" class="resource-category center blue-grey darken-<?php echo $key;?> col s6">



					<h3>
							<a class="white-text" href="<?php echo get_category_link( $value->term_id ); ?> "><?php echo $value->name;?></a>
					</h3>
					<?php if($value->name == "Memory Services") {
						echo '<i class="amber material-icons">update</i>';
					} elseif ($value->name == "Technology"){
						echo '<i class="amber material-icons">touch_app</i>';
					} elseif ($value->name == "Wayfinding"){
						echo '<i class="amber material-icons">transfer_within_a_station</i>';
					 }
					?>

				<?php
				if ($value->count == 1) {
					echo '<span id="excerpt" class="white-text"><p><span class="count">' . $value->count . '</span> resource</p></span>';
				} else {
					echo '<span id="excerpt"class="white-text"><p><span class="count">' . $value->count . '</span> resources</p></span>';
				}
				?>


			</div>

			<?php }
			?>

		</div>

	</section>

</main> <!-- end main -->

<?php get_footer(); ?>
