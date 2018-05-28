<?php get_header();
get_template_part( 'parts/content', 'breadcrumbs' );
$title = single_cat_title("", false);
?>
<main class="container">

		<div class="row" role="main">

			  <div class="col s9">

					<header>
						<h1 class="page-title center"><?php echo $title . ' Resources';?></h1>
					</header>

			    <?php if (have_posts()) : while (have_posts()) : the_post();


			get_template_part( 'parts/loop', 'blog' );

					?>

				<?php endwhile; ?>

					<?php joints_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</div>

				<?php get_sidebar('sidebar1'); ?>

		</div>

</main> <!-- end main -->

<?php get_sidebar('sidebar1'); ?>
<?php get_footer(); ?>
