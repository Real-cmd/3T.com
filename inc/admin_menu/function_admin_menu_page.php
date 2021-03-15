<?php

/*
 * @package 3T.com
 * ================================
 *             Admin Page
 * ================================
 */

function theme_add_admin_page(){

    /*====for General Submenu Page====*/

    // add_menu_page('Page title','menu title','capability','menu slug','CB functions','Icon','menu order no.');
    add_menu_page('Theme Sidebar Options','3T.com','manage_options','theme_3T.com','theme_admin_CB','',110);
    // add_submenu_page('Parent Slug','Page Title','Menu Title','Capability','Menu Slug','CB Functions');
    add_submenu_page('theme_3T.com','Theme Sidebar Options','General','manage_options','theme_3T.com','theme_admin_CB');

    /*====for Custom CSS Submenu Page====*/

    require (get_template_directory() . '/inc/admin_sub_menu/function_admin_submenu_page_CSSOption.php');

    // Activate Custom Settings
    add_action('admin_init','theme_3T_custom_settings');
}
add_action('admin_menu','theme_add_admin_page');

function theme_admin_CB(){
    require_once (get_template_directory() . '/inc/template/theme_admin_template.php');
}

function theme_3T_custom_settings(){
    register_setting('theme3T-set-register','first_name'); //first name

    add_settings_section('theme3T-set-section','Sidebar Options','theme3T_set_sectionCB','theme_3T.com'); // Sidebar Options section

    add_settings_field('theme3T-set-field','First Name','theme3T_set_fieldCB','theme_3T.com','theme3T-set-section');
}

function theme3T_set_sectionCB(){
    echo 'Customize your sidebar options';
}

function theme3T_set_fieldCB(){
    $firstname = esc_attr(get_option('first_name'));
    echo '<input type="text" placeholder="First Name" name="first_name" value="'.$firstname.'">';
}