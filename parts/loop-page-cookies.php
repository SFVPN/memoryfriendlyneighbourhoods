<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">


		<header class="privacy-header">
			<h1 class="entry-title single-title h2 center" itemprop="headline"><?php the_title();?></h1>
<?php // get_template_part( 'parts/content', 'share' );?>

		</header> <!-- end article header -->

    <section class="entry-content white container" itemprop="articleBody">
	    <?php the_content(); ?>
			<?php

// vars
$privacy = get_field('information_collected', 'option');

$cookies_set = $privacy['cookies_set'];
$cookies_text =  $privacy['use_of_cookies'];
$controlling_cookies = $privacy['user_control_cookies'];
$cookies_used = $privacy['cookies_used_text'];
$wp_cookies = $privacy['wp_cookies_text'];
$analytics_cookies = $privacy['analytics_cookies_text'];

?>
<div class="col s12 black-text">
<?php
 //$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');


 if(!$cookies_set) {
	 echo $privacy['no_cookies_set'];
 } else {
	 echo '<h2 class="h4">What are cookies</h2>';
	 echo $privacy['use_of_cookies'];
	 echo '<button type="button" class="btn" id="btn-revokeChoice">Revoke choice</button>';
 }
?>
<?php
 //$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');

 if($controlling_cookies) {
	 echo '<h2 class="h4">Controlling cookies</h2>';
	 echo $controlling_cookies;
 }
?>

<?php
 //$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');

 if($cookies_used) {
	 echo '<h2 class="h4">Cookies used by this site</h2>';
	 echo $cookies_used;
 }
?>

<?php
 //$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');

 if($wp_cookies) {
	 echo '<h2 class="h4">Cookies set for registered users</h2>';
	 echo $wp_cookies;
 }
?>

<?php
 //$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');

 if($analytics_cookies) {
	 echo '<h2 class="h4">Cookies set by analytics</h2>';
	 echo $analytics_cookies;
 }
?>
</div>
	</section> <!-- end article section -->

</article> <!-- end article -->
