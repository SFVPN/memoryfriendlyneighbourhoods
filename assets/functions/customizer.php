<?php
/*
This function is hooked into the customize_register action. The wp_customize parameter allows us to add our our sections, settings, and controls to the Theme Customizer.
*/

function tcx_register_theme_customizer( $wp_customize ) {
  $wp_customize->add_section(
    'tcx_contact_options',
    array(
        'title'     => 'Contact Options',
        'priority'  => 200
    )
);
$wp_customize->add_setting(
    'tcx_twitter_handle',
    array(
        'default'    =>  'dementiaMap',
        'sanitize_callback'  => 'tcx_sanitize_text',
        'transport'  =>  'refresh'
    )
);
$wp_customize->add_control(
    'tcx_twitter_handle',
    array(
        'section'   => 'tcx_contact_options',
        'label'     => 'Twitter Handle',
        'type'      => 'text',
        'description' => 'Add your Twitter handle here, <strong> without the @</strong>'
    )
);
$wp_customize->add_setting(
    'tcx_email_contact',
    array(
        'default'    =>  'yourname@example.com',
        'sanitize_callback'  => 'tcx_sanitize_text',
        'transport'  =>  'refresh'
    )
);
$wp_customize->add_control(
    'tcx_email_contact',
    array(
        'section'   => 'tcx_contact_options',
        'label'     => 'Email Contact',
        'type'      => 'email',
        'description' => 'Add your email address here.'
    )
);
$wp_customize->add_setting(
    'tcx_landline_contact',
    array(
        'default'    =>  '0131 447 1441',
        'sanitize_callback'  => 'tcx_sanitize_text',
        'transport'  =>  'refresh'
    )
);
$wp_customize->add_control(
    'tcx_landline_contact',
    array(
        'section'   => 'tcx_contact_options',
        'label'     => 'Landline',
        'type'      => 'tel',
        'description' => 'Add your landline number here.'
    )
);
$wp_customize->add_setting(
    'tcx_mobile_contact',
    array(
        'default'    =>  '07772 758 636',
        'sanitize_callback'  => 'tcx_sanitize_text',
        'transport'  =>  'refresh'
    )
);
$wp_customize->add_control(
    'tcx_mobile_contact',
    array(
        'section'   => 'tcx_contact_options',
        'label'     => 'Mobile',
        'type'      => 'tel',
        'description' => 'Add your mobile phone number here. <br /><br /><strong>Once you have added your contact details you need to click away from the final box to enable the "Save & Publish" button</strong>'
    )
);

$wp_customize->add_section(
    'tcx_logo_options',
    array(
        'title'     => 'Logo',
        'description' => '<strong>You can upload PNG, JPG or SVG files for your logo. SVGs scale nicely on different devices so, if you are confident working with this format, I would recommend using it.</strong>',
        'priority'  => 201
    )
);
$wp_customize->add_setting(
    'tcx_logo_image',
    array(
        'default'      => '',
        'transport'    => 'postMessage'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'tcx_logo_image',
        array(
            'label'    => 'Logo Image',
            'settings' => 'tcx_logo_image',
            'section'  => 'tcx_logo_options'
        )
    )
);
}
add_action( 'customize_register', 'tcx_register_theme_customizer' );

function tcx_sanitize_text ( $input ) {
    return strip_tags( stripslashes( $input ) );
}

/* The following function would hook into wp_head and inject a style block to change the anchor link colours to reflect any value in the options table updated by the tcx_link_color setting

function tcx_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'tcx_link_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'tcx_customizer_css' ); */
// Live Preview function not required for customizer options that are available
// function tcx_customizer_live_preview() {
//
//     wp_enqueue_script(
//         'tcx-theme-customizer',
//         get_template_directory_uri() . 'assets/js/theme-customizer.js',
//         array( 'jquery', 'customize-preview' ),
//         '0.3.0',
//         true
//     );
//
// }
// add_action( 'customize_preview_init', 'tcx_customizer_live_preview' );
