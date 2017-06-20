<?php
/* custom post-type for storing reported locations

*/
// let's create the function for the custom type
function custom_resources() {
	// creating (registering) the custom type
	register_post_type( 'resources', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Resources', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Resource', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Resources', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Resource', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Resources', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Resource', 'jointswp'), /* New Display Title */
			'view_item' => __('View Resource', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Resource', 'jointswp'), /* Search Resource Title */
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the resource custom post type', 'jointswp' ), /* Resource Description */
			'public' => true,
			'publicly_queryable' => true,
			'show_in_rest' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-clipboard', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'resources', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'resources', /* you can rename the slug here */
			'capability_type' => 'page',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'page-attributes', 'excerpt')
	 	) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'resources');
	/* this adds your post tags to your custom post type */
	//register_taxonomy_for_object_type('post_tag', 'custom_type');

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_resources');


 register_taxonomy( 'resource-category',
    	array('resources'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */
    		'labels' => array(
    			'name' => __( 'Resource Categories', 'bahamontestheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Resource Category', 'bahamontestheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Resource Categories', 'bahamontestheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Resource Categorys', 'bahamontestheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Type', 'bahamontestheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Type:', 'bahamontestheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Resource Category', 'bahamontestheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Resource Category', 'bahamontestheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Resource Category', 'bahamontestheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Resource Category Name', 'bahamontestheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
        'show_in_rest' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'resource-category' ),
    	)
    );


    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
    function namespace_add_custom_types( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
      $query->set( 'post_type', array(
       'post', 'nav_menu_item', 'resources'
  		));
  	  return $query;
  	}
  }
  add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

	add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {

    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'resources') );
    }

    return $query;

}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

?>
