<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<h5 class=""><?php echo _x( 'Looking for something?', 'label', 'jointstheme' ) ?></h5>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'jointstheme' ) ?></span>
		<input type="search" id="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter keywords...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointstheme' ) ?>" />
	</label>
	<input type="submit" class="search-submit btn" value="<?php echo esc_attr_x( 'Search', 'jointstheme' ) ?>" />
</form>
