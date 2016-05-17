
<?php $searchTitle = get_field('rh_title');
if($searchTitle){?>
  <h3><?php _e( $searchTitle); ?></h3>
<?php } else {?>
  <h4><?php _e( 'Search Locations') ?></h4>
<?php }?>

<p id="locationText" class="teal-text">
  <?php _e( the_field('rh_text') ); ?>
</p>




<?php wp_dropdown_categories( 'show_option_none=Select Local Authority&taxonomy=local_authority&hide_empty=0' ); ?>
<script type="text/javascript">
  <!--
  var dropdown = document.getElementById("cat");
  function onCatChange() {
    if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
      location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?local_authority="+dropdown.options[dropdown.selectedIndex].text;
    }
  }
  dropdown.onchange = onCatChange;
  -->
</script>
<h5 class=""><?php echo _x( 'OR', '', 'jointstheme' ) ?></h5>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <label>

    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'jointstheme' ) ?></span>
    <input type="search" id="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter town or area name...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'jointstheme' ) ?>" />
  </label>
  <input type="submit" class="search-submit btn" value="<?php echo esc_attr_x( 'Find', 'jointstheme' ) ?>" />
</form>
