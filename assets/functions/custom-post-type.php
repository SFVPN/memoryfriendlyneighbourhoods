<?php
/* custom post-type for storing reported locations

*/


 register_taxonomy( 'resource-category',
    	array('post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
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
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'resource-category' ),
    	)
    );


    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */


?>
