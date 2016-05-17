<?php
// Theme support options

require_once(get_template_directory().'/assets/functions/theme-support.php');

// Customizer options
require_once(get_template_directory().'/assets/functions/customizer.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Setup initial pages and assign to main menu
// require_once(get_template_directory().'/assets/functions/setup-pages.php');


// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php');

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php');

// Use this as a template for custom post types
require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php');

// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php');


add_filter('um_countries_predefined_field_options','um_countries_predefined_field_options');
function um_countries_predefined_field_options( $countries ) {

    $countries[] = array("XV" => "Xtland");

    return $countries;
}
// function Users() {
//
//   $blogusers = get_users( array( 'fields' => array('display_name', ID ) ) );
//
//   foreach ( $blogusers as $user ) {
//     $name = $user->display_name;
//     $a[$user->ID] = $name;
//   }
//
//     return $a;
// }
//
// function my_search_form() {
//     $args = array();
//     $args['debug'] = false;
//     $args['wp_query'] = array('post_type' => 'post',
//                               'posts_per_page' => 5);
//     $args['fields'][] = array('type' => 'taxonomy',
//                               'label' => 'Choose a category',
//                               'taxonomy' => 'resource-category',
//                               'format' => 'select',
//                               'allow_null' => 'select');
//     $args['fields'][] = array('type' => 'meta_key',
//                               'label' => 'Choose an author',
//                               'meta_key' => 'participants',
//                               'format' => 'select',
//                               'values' => Users(),
//                               'data_type' => 'ARRAY<CHAR>',
//                               'compare' => 'LIKE',
//                               'allow_null' => 'select');
//     $args['fields'][] = array( 'type' => 'submit',
//                               'class' => 'btn',
//                               'value' => 'Search' );
//     register_wpas_form('my-form', $args);
// }
// add_action('init', 'my_search_form');
