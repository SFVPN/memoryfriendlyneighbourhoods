

<div id="About-network" class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo $form_id; ?>">

	<div class="um-form"  style="padding-top: 0rem;">



				<?php do_action('um_members_directory_search', $args ); ?>

			<?php do_action('um_members_directory_head', $args ); ?>

			<?php do_action('um_members_directory_display', $args ); ?>

			<?php do_action('um_members_directory_footer', $args ); ?>

	</div>


	<div id="search_network" class="um-form modal bottom-sheet">
		<div class="modal-content">
			<?php //do_action('um_members_directory_search', $args ); ?>
		</div>




				<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-red white-text btn-flat materialize-red lighten-2">CLOSE</a>
				</div>
	</div>


</div>
