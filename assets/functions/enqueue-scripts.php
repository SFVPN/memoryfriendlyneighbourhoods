<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// Removes WP version of jQuery
	wp_deregister_script('jquery');

	// Load jQuery files in header - load in header to avoid issues with plugins
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/vendor/jquery/dist/jquery.min.js', array(), '', false );

    // Load What-Input files in footer
    //wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

    // Adding Introjs scripts file in the footer
  wp_enqueue_script( 'intro-js', 'https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/intro.min.js', array( 'jquery' ), '', true );


    // Adding Materialize scripts file in the footer
  wp_enqueue_script( 'materialize-js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js', array( 'jquery' ), '', true );

  // Adding Cookie Consent scripts file in the footer
    $cookies = get_field('information_collected', 'option');


    $cookies_set = $cookies['cookies_set'];

    if($cookies_set) {
      wp_enqueue_script( 'cookie-js', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', array(), '', true );
      wp_enqueue_script( 'cookie-init-js', get_template_directory_uri() . '/assets/js/cookies.js', array( 'cookie-js' ), '', true );

      wp_enqueue_style( 'slick-css', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), '', 'all' );
    }
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Register main stylesheet

    // Register material icons stylesheet
    wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '', 'all' );


    // Register Introjs stylesheet
    wp_enqueue_style( 'introjs-css', 'https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/introjs.min.css', array(), '', 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/materialize.css', array(), '', 'all' );

    // Deregister admin stylesheet so that it doesn't load on the front-end form

    wp_deregister_style( 'wp-admin' );


    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
