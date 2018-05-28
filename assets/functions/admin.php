<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// Remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// Remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');

	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

}

remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function welcome_dashboard_widgets() {

	wp_add_dashboard_widget(
                 'welcome_dashboard_widget',         // Widget slug.
                 'Getting Started',         // Title.
                 'welcome_dashboard_widget_function' // Display function.
        );
}
add_action( 'wp_dashboard_setup', 'welcome_dashboard_widgets' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */
function welcome_dashboard_widget_function() {
			echo
			'<div class="welcome-panel">
				<h1>Welcome to your site</h1>
				<p class="about-description">Here are some links to get you started.</p>
					<a class="button button-primary button-hero" href="' . admin_url() . 'customize.php" target="_blank">Customize your site\'s contact options and logo</a>
				</p>
				<div class="welcome-panel-column">
					<h3>Next Steps</h3>
					<ul>
						<li>
							<a class="welcome-icon welcome-add-page" href="' . admin_url() . 'post-new.php">Add Blog Post</a>
						</li>
					</ul>
				</div>
			</div>';
}

// Calling all custom dashboard widgets
function charly_custom_dashboard_widgets() {

	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'charly_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function charly_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="http://alastaircox.com" target="_blank">Alastair Cox</a></span>.', 'charlywp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'charly_custom_admin_footer');
