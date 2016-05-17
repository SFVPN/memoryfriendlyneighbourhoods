<?php
/*********************
CREATE INITIAL SETUP PAGES
*********************/
add_action('after_setup_theme', 'create_pages');
function create_pages(){
    $home_page_id = get_option("home_page_id");
    if (!$home_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Home",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);
        update_post_meta($postID, "_wp_page_template", "page.php");
        update_option("home_page_id", $postID);
    }
    $form_page_id = get_option("form_page_id");
    if (!$form_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Form",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
            'comment_status' => 'closed'
        );
        $postID = wp_insert_post($post1, $error);
        update_post_meta($postID, "_wp_page_template", "page-form.php");
        update_option("form_page_id", $postID);
    }
    $privacy_page_id = get_option("privacy_page_id");
    if (!$privacy_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Privacy",
            'post_content' => "Put some details about your privacy/cookies policy here. Example text can be found at the following <a href='https://docs.google.com/document/d/12G_kb1WBHDLutD7v-_-gH5ke6sxjzUgSSAu5LSdikXo/edit?usp=sharing'>link</a>",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);
        update_post_meta($postID, "_wp_page_template", "page.php");
        update_option("privacy_page_id", $postID);
    }
    $blog_page_id = get_option("blog_page_id");
    if (!$blog_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Blog",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);
        update_post_meta($postID, "_wp_page_template", "archive.php");
        update_option("blog_page_id", $postID);
    }
}

// Sets 'Home' as the static front page
$home = get_page_by_title( 'Pathways' );
update_option( 'page_on_front', $home->ID );
update_option( 'show_on_front', 'page' );

// Sets 'Blog' as the blog page
$blog   = get_page_by_title( 'Blog' );
update_option( 'page_for_posts', $blog->ID );

/*********************
CREATE MENU ITEMS FROM SETUP PAGES AND ASSIGN THESE AS MAIN-NAV
// Check if the menu exists
$menu_exists = wp_get_nav_menu_object( 'Main Navigation' );
// If it doesn't exist, let's create it.
if( !$menu_exists){
    $menu_id = wp_create_nav_menu('Main Navigation');
	// Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Home'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('home')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('About'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('about')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Blog'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('blog')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Privacy'),
        'menu-item-object' => 'page',
        'menu-item-object-id' => get_page_by_path('privacy')->ID,
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish'));
    $locations = get_theme_mod('nav_menu_locations'); //get the menu locations
    $locations['main-nav'] = $menu_id; //set our new menu to be the main nav
    set_theme_mod('nav_menu_locations', $locations); //update
}
*********************/
