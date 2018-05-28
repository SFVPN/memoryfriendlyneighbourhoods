<?php //get_template_part( 'parts/content', 'breadcrumbs' ); ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $post->post_name;?>" role="article" itemscope itemtype="http://schema.org/WebPage">


		<header class="privacy-header">
			<h1 class="entry-title single-title h2 center" itemprop="headline"><?php the_title();?></h1>
<?php // get_template_part( 'parts/content', 'share' );?>

		</header> <!-- end article header -->

    <section class="entry-content white container" itemprop="articleBody">
	    <?php the_content(); ?>

			<?php
		echo '<div class="col s12 black-text"><p>'. get_field('privacy_general', 'option') . '</p></div>';
// vars
$privacy = get_field('information_collected', 'option');

if( $privacy ):
$no_info = $privacy['no_information_collected'];
$user_info = $privacy['user_information_collected'];
$subscriber_info = $privacy['subscriber_information_collected'];

?>


	<div class="col s12 black-text">
		<?php if(!$no_info) {
			echo '<p>'. $privacy['no_information_text'] . '</p>';
		} else {
			echo '<h2 class="h4">Why do you collect personal information?</h2><p>'. $privacy['information_text_intro'] . '</p>';
		}
		if($user_info && $no_info) {
			echo '<p><i class="material-icons left">arrow_forward</i>'. $privacy['user_information_text'] . '</p>';
		}
		if($subscriber_info && $no_info) {
			echo '<p><i class="material-icons left">arrow_forward</i>'. $privacy['mailing_list_text'] . '</p>';
		}
		?>
	</div>


	<div class="col s12 black-text">
		<?php if(($subscriber_info && $no_info) || ($user_info && $no_info)) {
			if( have_rows('information_collected', 'option') ):

	while( have_rows('information_collected', 'option') ) : the_row();

			$info_use = get_sub_field('information_use');

	endwhile;

endif;


			echo '<h2 class="h4">How is your information used?</h2>';
			if($user_info) {
				echo '<p>' . $info_use['user_information_use'] . '</p>';
			}
			if($subscriber_info) {
				echo '<p>' . $info_use['subscriber_information_use'] . '</p>';
			}
			echo '<h2 class="h4">Who has access to your information?</h2>';
			echo '<p>' . $privacy['privacy_access'] . '</p>';
		}
		?>
	</div>

	<div class="col s12 black-text">
		<?php
			//$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');
			echo '<h2 class="h4">How we protect your information</h2>';
			echo '<p>' . $privacy['how_we_protect_your_information'] . '</p>';


		?>
	</div>

	<div class="col s12 black-text">
		<?php
			//$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');
			echo '<h2 class="h4">Cookies</h2>';

			$cookies_set = $privacy['cookies_set'];
			if(!$cookies_set) {
				echo '<p>' . $privacy['no_cookies_set'] . '</p>';
			} else {
				echo '<p>' . $privacy['use_of_cookies'];
					if($privacy['cookies_page_link']) {
						echo '<a class="btn-large" href="' . $privacy['cookies_page_link'] . '">View Full Cookies Policy</a>';
					}
				 echo '</p>';
			}





		?>
	</div>
	<div class="col s12 black-text">
		<?php
			//$fieldObject = get_sub_field_object('how_we_protect_your_information', 'option');
			echo '<h2 class="h4">Links</h2>';
				echo '<p>' . $privacy['links_to_other_sites'] . '</p>';;


		?>
	</div>
</div>

<?php endif; ?>



	    <?php wp_link_pages(); ?>
	</section> <!-- end article section -->

</article> <!-- end article -->
