

		<footer id="contact" class="page-footer center">
			<?php if (is_front_page()) {
			echo '<div id="logos" class="row white center" role="banner">
			<img class="responsive-img" alt="banner showing the logos of institutions participating in the Memory-Friendly Neighbourhoods project" src="http://memoryfriendly.org.uk/wp-content/uploads/2014/04/MFN-website-logo-banner.jpg" />
			</div>';
		}?>
			<div id="inner-footer" class="container">
				<p>Contact Us</p>
				<ul class="col s12 l12">
					<?php
					$email_contact = get_theme_mod('tcx_email_contact');
					if ($email_contact) {
						echo ' <li><a href="mailto:' . $email_contact . '" target="_blank"><i class="mdi mdi-email" aria-hidden="true"></i> Email us</a></li>';
					}?>
					<?php
					$twitter_handle = get_theme_mod('tcx_twitter_handle');
					if ($twitter_handle) {
						echo '<li><a href="https://twitter.com/' . $twitter_handle . '" target="_blank"><i class="mdi mdi-twitter" aria-hidden="true"></i> Follow us on Twitter</a></li>';
					}?>
					<?php
					$landline_contact = get_theme_mod('tcx_landline_contact');
					if ($landline_contact) {
						echo '<li aria-label="Our phone number is"><a href="tel://+' . $landline_contact . '" target="_blank"><i class="mdi mdi-phone" aria-hidden="true"></i> ' . $landline_contact . '</a></li>';
					}?>
					<?php
					$mobile_contact = get_theme_mod('tcx_mobile_contact');
					if ($mobile_contact)  {
						echo '<li aria-label="Our mobile phone number is"><a href="tel://+' . $mobile_contact . '" target="_blank"><i class="mdi mdi-cellphone" aria-hidden="true"></i> ' . $mobile_contact . '</a></li>';
					}?>
				</ul>

				<div class="col s12">
					<p class="source-org copyright">
						<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &copy; <?php echo date("Y");?>
					</p>
				</div>

			</div> <!-- end #inner-footer -->
		</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
