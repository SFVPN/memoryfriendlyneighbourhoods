<?php get_header();
$title = post_type_archive_title("", false);
$slug = sanitize_title($title);
$term = wp_count_posts('resources');
?>

<main class="row">



		<header class="<?php echo strtolower($title); ?>-article-header col s12 center">


			<h1 class="page-title light"><?php echo $title ?></h1>

			<?php



			if ($term->publish == 1) {
				echo '<span id="excerpt"><p><span class="count">' . $term->publish . '</span> item</p></span>';
			} else {
				echo '<span id="excerpt"><p><span class="count">' . $term->publish . '</span> items</p></span>';
			}

			?>

		<div class="center col s12" style="">

				<?php
				$res_categories = get_terms( array('taxonomy' => 'resource-category','hide_empty' => false,) );

				foreach( $res_categories as $key=>$value ) {
				?>

			<div id="cat-<?php echo $key;?>" class="chip white">
<a class="whitetext" href="<?php echo get_category_link( $value->term_id ); ?> ">



							<?php echo $value->name . ' (' . $value->count . ')';?>

					


				</a>
			</div>

			<?php }
			?>

		</div>

</header> <!-- end article header -->
<section id="About-<?php echo $slug;?>" class="archive-container col s12">

	<?php if (have_posts()) : while (have_posts()) : the_post();

	get_template_part( 'parts/loop', 'blog' );

	?>

	<?php endwhile; ?>

	<?php joints_page_navi(); ?>

	<?php else : ?>

	<?php get_template_part( 'parts/content', 'missing' ); ?>

	<?php endif; ?>
	</section>
	<?php get_sidebar('archives'); ?>
</main> <!-- end main -->

<?php get_footer(); ?>
