<?php
/*
Template Name: Form
*/

acf_form_head();

get_header();

global $current_user;
get_currentuserinfo();
$url = get_permalink();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<main class="container">

	<div class="row" role="main">

		<div class="col s12">
<?php if ($url == $actual_link ) {?>
			<header class="article-header">


				<h1 class="page-title center"><?php the_title(); ?></h1>

				<? //var_dump($post);?>
			</header> <!-- end article header -->


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php //get_template_part( 'parts/loop', 'page' ); ?>

<?php


get_template_part( 'parts/content', 'form' );


endwhile; endif;
} elseif ($current_user->user_firstname) {
  echo '<div class="container"><h3 class="">
  Thanks for your submission ' . $current_user->user_firstname . '. It will be checked by our helper monkeys and published shortly.
  </h3><a href="'. $url . '" class="btn">Add Another Resource</a></div>';
} elseif (!is_user_logged_in ()) {
	echo '<div class="container"><h3 class="">
  Thanks for your submission. It will be checked by our helper monkeys and published shortly.
  </h3><a href="'. $url . '" class="btn col s5">Add Another Resource</a><a href="'. get_permalink( get_page_by_path( 'Register' ) ) . '" class="btn col s5 push-s2">' . get_the_title(get_page_by_path( 'Register' )) . '</a></div>';
}?>
		</div> <!-- end s12 -->

		    <?php // get_sidebar(); ?>

	</div> <!-- end row -->

</main> <!-- end main -->


<?php get_footer(); ?>
