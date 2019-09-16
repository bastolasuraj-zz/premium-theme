<?php
/*
 * @package sbbcTheme
 * +++++++++++++++++++++++++
 * Admin Page
 * +++++++++++++++++++++++++
 */
function sbbc_add_admin_page(){
    //Generating Theme Admin Page
    add_menu_page('Theme Options','Sbastola','manage_options','sbbc_theme_options','sbbc_theme_create_page','dashicons-wordpress-alt',110);

    //Generating Theme Submenu Pages
    add_submenu_page('sbbc_theme_options','Theme Options','General','manage_options','sbbc_theme_options','sbbc_theme_create_page');

    add_submenu_page('sbbc_theme_options','Theme Options Css','Custom CSS','manage_options','sbbc_theme_options_css','sbbc_theme_settings_page');

    //Activate Common Settings
    add_action('admin_init','sbbc_custom_settings');
}
add_action('admin_menu','sbbc_add_admin_page');
function sbbc_theme_create_page(){
    //generation of admin page
    require_once get_template_directory().'/inc/templates/theme-admin.php';
}
function sbbc_custom_settings(){
    register_setting('sbbc-settings-group','profile_picture');
    register_setting('sbbc-settings-group','first_name');
    register_setting('sbbc-settings-group','last_name');
    register_setting('sbbc-settings-group','description');
    register_setting('sbbc-settings-group','facebook_handle');
    register_setting('sbbc-settings-group','twitter_handle','sbbc_sanitize_twitter_handler');
    register_setting('sbbc-settings-group','linkedin_handle');

    add_settings_section('sbbc-sidebar-options','Sidebar Options','sunset_sidebar_options','sbbc_theme_options');

    add_settings_field('sbbc-sidebar-profile-picture','Profile Picture','sbbc_sidebar_profile_picture','sbbc_theme_options','sbbc-sidebar-options');
    add_settings_field('sbbc-sidebar-name','Full Name','sbbc_sidebar_name','sbbc_theme_options','sbbc-sidebar-options');
    add_settings_field('sbbc-sidebar-description','Description','sbbc_sidebar_description','sbbc_theme_options','sbbc-sidebar-options');
    add_settings_field('sbbc-sidebar-facebook','Facebook','sbbc_sidebar_facebook','sbbc_theme_options','sbbc-sidebar-options');
    add_settings_field('sbbc-sidebar-twitter','Twitter','sbbc_sidebar_twitter','sbbc_theme_options','sbbc-sidebar-options');
    add_settings_field('sbbc-sidebar-linkedin','LinkedIn','sbbc_sidebar_linkedin','sbbc_theme_options','sbbc-sidebar-options');
}
function sunset_sidebar_options(){
    echo 'Customize your Sidebar Settings.';
}
function sbbc_sidebar_profile_picture(){
    $profile_picture = esc_attr__( get_option('profile_picture'));
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">';
    echo '<input type="hidden" name="profile_picture" value="'.$profile_picture.'" id="profile-picture">';
}
function sbbc_sidebar_name(){
    $firstname = esc_attr__( get_option('first_name'));
    $lastname = esc_attr__( get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstname.'" placeholder="First Name">';
    echo '<input type="text" name="last_name" value="'.$lastname.'" placeholder="Last Name">';
}
function sbbc_sidebar_description(){
    $description = esc_attr__( get_option('description'));
    echo '<input type="text" name="description" value="'.$description.'" placeholder="Description">';
}

function sbbc_sidebar_facebook(){
    $facebook = esc_attr__( get_option('facebook_handle'));
    echo '<input type="text" name="facebook_handle" value="'.$facebook.'" placeholder="Facebook Handler">';
}
function sbbc_sidebar_twitter(){
    $twitter = esc_attr__( get_option('twitter_handle'));
    echo '<input type="text" name="twitter_handle" value="'.$twitter.'" placeholder="Twitter Handler">';
    echo '<p class="description">@ is optional</p>';
}
function sbbc_sidebar_linkedin(){
    $linkedin = esc_attr__( get_option('linkedin'));
    echo '<input type="text" name="linkedin_handle" value="'.$linkedin.'" placeholder="LinkedIn Handler">';
}
//sanitization options
function sbbc_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@','',$output);
    return $output;
}
//add_action('admin_menu','sbbc_add_settings_page');
function sbbc_theme_settings_page(){
    //generation of admin page
}