<div id="byline" class="grey-text" role="contentinfo">
	<i class="mdi mdi-clock" aria-hidden="true"></i> Posted on

	<?php
	the_time('F j, Y');
	$authors = get_field('participants');
	if ($authors){
				echo ' - <i class="mdi mdi-account-multiple tooltipped" data-position="below" data-delay="50" data-tooltip="This resource was posted by the following"></i> ';

	foreach ($authors as $author){
		$fn =  $author['user_firstname'];
		$ln = $author['user_lastname'];
		echo '<span aria-label="Author name"><a href="/profile/' . strtolower($fn) . '-' . strtolower($ln) . '">' . $fn . ' ' . $ln . ', </a></span>';
	}
	}
	?>

</div>

<?php
if(!is_single()){
	if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			echo '<span class="new badge" aria-hidden="true"></span>';
	}
}
?>
