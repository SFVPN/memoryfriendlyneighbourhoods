<?php
get_header(); ?>
<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

	<main class="row" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php

							get_template_part( 'parts/loop', 'child-pages' );

					endwhile; endif;
				?>

	</main> <!-- end main -->

	<div>


	<img src="https://ichef.bbci.co.uk/news/624/cpsprodpb/A42A/production/_98462024_mediaitem98462023.jpg" width="750px" alt="Planets" usemap="#imgmap20171024215147">

	<map id="imgmap20171024215147" name="imgmap20171024215147"><area class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am a tooltip"  shape="circle"  title="" coords="97,170,57" href="#" target="" />
<area class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="I am a tooltip"  shape="circle"  title="" coords="542,139,3" href="#" target="" />
	</div>


	 <div id="modal1" class="modal">
	    <div class="modal-content">
	      <h4>Modal Header</h4>
	      <p>A bunch of text</p>
	    </div>
	    <div class="modal-footer">
	      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
	    </div>
	  </div>

<script>
$(document).ready(function(){
// the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
$('.modal').modal();
});

</script>

<?php get_footer(); ?>
