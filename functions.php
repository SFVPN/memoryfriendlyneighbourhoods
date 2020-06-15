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
require_once(get_template_directory().'/assets/functions/admin.php');



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

add_action('acf/save_post', 'my_save_post');

    function my_save_post( $post_id ) {

      // bail early if not a contact_form post
      if( get_post_type($post_id) !== 'programmes' ) {

        return;

      }


      // bail early if editing in admin
      if( is_admin() ) {

        return;

      }

      $blogID = get_field('cdn_blog_page', 'option');
      $eventsID = get_field('cdn_events_page', 'option');
      $date = get_field('event_date', $post_id);
      $comments = get_field('comments_open', $post_id);
      if($comments) {
        $status = 'open';
      } else {
        $status = 'closed';
      }

      if($date) {
        $my_post = array(
            'ID'           => $post_id,
            'post_parent'   => $eventsID
        );
      } else {
        $my_post = array(
            'ID'           => $post_id,
            'post_parent'   => $blogID,
            'comment_status' => $status
        );
      }


      add_action('acf/save_post', 'my_save_post');

      wp_update_post( $my_post );

    }



function highlight_search_term($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-term">\0</span>', $text);
	}
    return $text;
}
add_filter('the_excerpt', 'highlight_search_term');
add_filter('the_title', 'highlight_search_term');



function add_introjs_menu_atts( $atts, $item, $args ) {
  $register = get_field('join_network', 'option');
  $register = get_the_title($register);
	if( $args->theme_location == 'main-nav' ) {
    if ($item->title == 'Register') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the page to "' . strtoupper($item->title) . '" for the network';
    } elseif ($item->title == 'Network') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page where you can browse our members';
    } elseif ($item->title == 'Events') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page where you can read about MFN gatherings';
    } elseif ($item->title == 'Resources') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page where you can view dementia-related information';
    } elseif ($item->title == 'About') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page where you can read about the background of MFN';
    } elseif ($item->title == 'Accessibility') {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page where you can change the text size for the website for easier reading';
    } else {
      $atts['data-intro'] = 'Clicking on this menu item will take you to the "' . strtoupper($item->title) . '" page';
    }
	}
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_introjs_menu_atts', 10, 3 );



function alter_participants_user_field($result, $user, $field, $post_id) {

    $result = '';

    if( $user->first_name ) {

        $result .= $user->first_name;

        if( $user->last_name ) {

            $result .= ' ' . $user->last_name;

        }

        $result .= '';
    }

    return $result;
}
add_filter("acf/fields/user/result/key=field_57346973097e8", 'alter_participants_user_field', 10, 4);

$roles_enabled = get_field('roles_enabled', 'options');

if($roles_enabled) { // let us turn this functionality off so we we're not checking whether a role exists every time the admin loads
require_once(get_template_directory().'/assets/functions/create_roles.php');

}

add_action('init','login_redirect');

function login_redirect(){
 global $pagenow;
 if( 'wp-login.php' == $pagenow ) {
  wp_redirect(home_url . '/login/');
  exit();
 }
}
