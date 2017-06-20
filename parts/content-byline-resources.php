<div id="byline" class="row card-action" role="contentinfo">

	<div class="col s6">
		<h6 class="card-sub-title">Authors <i class="grey-text tooltipped mdi mdi-help-circle" data-position="right" data-delay="50" data-tooltip="This shows the resource authors"> </i></h6>

		<?php $authors = get_field('authors');
		foreach ($authors as $author){
			$fn =  $author['user_firstname'];
			$ln = $author['user_lastname'];
			echo '<p><a href="/mfn/profile/' . strtolower($fn) . '-' . strtolower($ln) . '">' . $fn . ' ' . $ln . ' </a></p>';
		}?>
	</div>
	<div class="col s6">
		<h6 class="card-sub-title">Areas of interest <i class="grey-text tooltipped mdi mdi-help-circle" data-position="right" data-delay="50" data-tooltip="Click on the links below to view related resources"> </i></h6>

		<?php
		if(!is_single()){
			echo get_the_term_list( $post->ID,'category', '<p>', '</p><p>', '</p>');
		} else {
			echo get_the_term_list( $post->ID,'category','',', '); // category will be changed to whatever the resource taxonomy is
		}
		?>

		<span class="badge card-title grey-text "><?php echo the_time('F j, Y');?></span>

	</div>

</div>

<div class="card-action">
		<a href="#" class="tooltipped" data-position="right" data-delay="50" data-tooltip="This link takes you to an external website">View this video <i class="grey-text mdi mdi-video" > </i></a>

		<?php
		if( strtotime( $post->post_date ) > strtotime('-7 day') ) {
			 	echo '<span class="badge new"></span>';
		}
		?>

</div>
