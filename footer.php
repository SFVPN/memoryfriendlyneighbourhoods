					<footer id="contact" class="page-footer center" role="contentinfo">
						<div id="inner-footer" class="container">
							<h6>Contact Us</h6>
							<ul class="col s12 l12">
									<?php
									$email_contact = get_theme_mod('tcx_email_contact');
									if ($email_contact) {
											echo ' <li><a href="mailto:' . $email_contact . '" target="_blank"><i class="mdi mdi-email"></i> Email</a></li>';
									}?>
									<?php
									$twitter_handle = get_theme_mod('tcx_twitter_handle');
									if ($twitter_handle) {
									echo '<li><a href="https://twitter.com/' . $twitter_handle . '" target="_blank"><i class="mdi mdi-twitter"></i> Follow us on Twitter</a></li>';
									}?>
									<?php
									$landline_contact = get_theme_mod('tcx_landline_contact');
									if ($landline_contact) {
									echo '<li><a href="tel://+' . $landline_contact . '" target="_blank"><i class="mdi mdi-phone"></i> ' . $landline_contact . '</a></li>';
									}?>
									<?php
									$mobile_contact = get_theme_mod('tcx_mobile_contact');
									if ($mobile_contact)  {
									echo '<li><a href="tel://+' . $mobile_contact . '" target="_blank"><i class="mdi mdi-cellphone"></i> ' . $mobile_contact . '</a></li>'; }?>
							</ul>

							<div class="col s12">
								<p class="source-org copyright">
									<!-- <?php
									$page = get_page_by_title( 'Privacy' );
									if ($page) {
										wp_list_pages( 'title_li=&include=' . $page->ID );
									} else {
										wp_list_pages('title_li=');
									}
										?> -->
									<?php $logo_image = get_theme_mod( 'tcx_logo_image' );
				 				 if ($logo_image){

									 ?>
								

								<?php } else {?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg">
							<?php }?>
								<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &copy <?php echo date("Y");?>
								</p>
							</div>

						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
