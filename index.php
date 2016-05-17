<?php get_header();
$title = single_cat_title("", false);
?>



<main class="container">

		<div class="row" role="main">

		    <div class="col s12">

					<header>
						<h1 class="page-title center">Resources</h1>
					</header>
			    <?php if (have_posts()) : while (have_posts()) : the_post();

					endwhile;

					$res_categories = get_terms( array(
    'taxonomy' => 'resource-category',
    'hide_empty' => false,
) );
	echo '<h2 class="page-title center">Categories</h2>';
	foreach( $res_categories as $res_category ) {?>
		<div style="padding: 2em;" class=" col s6">
			<div style="border-bottom: 4px solid teal; margin-bottom: 3em;"class="col s12">

				<h3 class="center"><a href="<?php echo get_category_link( $res_category->term_id ); ?> "><?php echo $res_category->name;?></a></h3>
				<span class="center">[<?php echo $res_category->count;?>]</span>
			</div>
<?php //print_r($category);?>
		</div>
	<?php } ?>

	<?php
	$categories = get_terms( array(
'taxonomy' => 'category',
'hide_empty' => false,
) );
echo '<h2 class="page-title center">Types</h2>';
foreach( $categories as $category ) {?>
<div style="padding: 2em;" class=" col s6">
<div style="border-bottom: 4px solid teal; margin-bottom: 3em;"class="col s12">

<h3 class="center"><a href="<?php echo get_category_link( $category->term_id ); ?> "><?php echo $category->name;?></a></h3>
<span class="center">[<?php echo $category->count;?>]</span>
</div>
<?php //print_r($category);?>
</div>
<?php } ?>




				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>
			</div>


			</div> <!-- end row -->

		</main> <!-- end main -->



<?php get_footer(); ?>
