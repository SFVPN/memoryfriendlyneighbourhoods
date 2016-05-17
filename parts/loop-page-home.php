<section id="post-<?php the_ID(); ?>" class="col s12 center" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->
	<div class="entry-content" itemprop="articleBody">
	<?php //the_content(); ?>
</div>

<?php

// check if the repeater field has rows of data
if( have_rows('key_pages') ):

 	// loop through the rows of data
    while ( have_rows('key_pages') ) : the_row();
		$page_ID = get_sub_field('page_name');
		?>
		<aside class="col s12 l4">
		<a class="teal-text" href="<?php the_permalink($page_ID);?>">	<div class="key-pages container white waves-effect waves-light">
<h4><?php echo get_the_title($page_ID);?></h4>
				<i style="font-size: 8em;" class="mdi teal-text mdi-<?php the_sub_field('page_icon');?>"></i>

			</div></a>
		</aside>
<?php

    endwhile;

else :

    // no rows found

endif;

?>


</section> <!-- end article -->
