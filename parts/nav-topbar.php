<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->

	 <nav>
	     <div class="nav-wrapper container"><img id="logo"
				 <?php $logo_image = get_theme_mod( 'tcx_logo_image' );
				 if ($logo_image){?>
					 src="<?php echo $logo_image;?>"
				 <?php
			 } else {?>
				 src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg"
			 <?php }?>
			  />
				 <a href="<?php bloginfo('url'); ?>" class="brand-logo"><?php bloginfo('name'); ?></a>

				  <!-- Uncomment this to use a slide-out side navigation on mobile. You will also have to comment out or remove "get_template_part( 'parts/content', 'offcanvas' )" in header.php

					<span class="fixed-action-btn hide-on-large-only">
						<button href="#modal1" class="btn-floating btn modal-trigger waves-effect waves-light" style="top: 0px; right: -10px;"><i class="mdi mdi-menu"></i></button>
					</span>

	       -->

				 <span class="hide-on-med-and-down right">
					 	<?php joints_top_nav(); ?>
				 </span>

				 <span id="nav-mobile" class="side-nav">
	         <?php joints_top_nav(); ?>
	       </span>
	       <a href="" data-activates="nav-mobile" class="button-collapse right"><i class="mdi mdi-menu"></i></a>




	     </div>

	   </nav>

		 <!-- Comment this line out if using a slide-out side nav menu on mobile. You will also need to uncomment the relevant <span> in nav-topbar.php to activate this.   -->
		<?php // get_template_part( 'parts/content', 'offcanvas' ); ?>
