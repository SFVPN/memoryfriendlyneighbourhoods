<?php
get_header();
$title = post_type_archive_title("", false);
$slug = sanitize_title($title);
$description = strtolower($title) . '_description';
?>
<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">
		<header class="<?php echo strtolower($title); ?>-article-header col s12 center">


			<h1 class="page-title light"><?php echo $title ?></h1>

		</header>
		<div class="col s12 entry-content">
			<?php the_field( $description, 'option'); ?>
		</div>
			<div id="parent-wrapper" class="no-padding col s12">

			<?php if (have_posts()) : while (have_posts()) : the_post();


							get_template_part( 'parts/loop', 'archive-programmes' );

					endwhile; endif;
				?>

				</div>

	</main> <!-- end main -->



<?php get_footer(); ?>
