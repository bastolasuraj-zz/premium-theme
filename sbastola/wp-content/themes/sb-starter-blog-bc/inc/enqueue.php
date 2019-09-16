<?php
/*
 * @package sbbcTheme
 * +++++++++++++++++++++++++
 * Admin Enqueue Functions
 * +++++++++++++++++++++++++
 */
function sbbc_load_admin_scripts( $hook ){
    if('toplevel_page_sbbc_theme_options'!=$hook){
        return;
    }
    wp_register_style('sbbc_admin_style',get_template_directory_uri().'/css/sbbc.admin.css',array(),1.0,'all');
    wp_enqueue_style('sbbc_admin_style');

    wp_enqueue_media();

    wp_register_script('sbbc_admin_script',get_template_directory_uri().'/js/sbbc.admin.js',array('jquery'),1.0,true);
    wp_enqueue_script('sbbc_admin_script');
}
add_action('admin_enqueue_scripts','sbbc_load_admin_scripts');