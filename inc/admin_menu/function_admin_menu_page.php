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
    register_setting('theme3T-set-register','first_name'); // First name
    register_setting('theme3T-set-register','last_name'); // Last name
    register_setting('theme3T-set-register','user_description'); // User Description
    register_setting('theme3T-set-register','twitter_handle','theme3T_set_register_saniCB'); // Twitter
    register_setting('theme3T-set-register','facebook_handle'); // Facebook
    register_setting('theme3T-set-register','gplus_handle'); // GPlus

    add_settings_section('theme3T-set-section','Sidebar Options','theme3T_set_sectionCB','theme_3T.com'); // Sidebar Options section

    add_settings_field('theme3T-set-field','Full Name','theme3T_set_fieldCB','theme_3T.com','theme3T-set-section'); //Full Name
    add_settings_field('theme3T-set-field_description','Description','theme3T_set_description_fieldCB','theme_3T.com','theme3T-set-section'); //Full Name
    add_settings_field('theme3T-set-field_twitter','Twitter Handle','theme3T_set_twitter_fieldCB','theme_3T.com','theme3T-set-section'); //Twitter
    add_settings_field('theme3T-set-field_facebook','Facebook Handle','theme3T_set_facebook_fieldCB','theme_3T.com','theme3T-set-section'); //Facebook
    add_settings_field('theme3T-set-field_googleplus','Google+ Handler','theme3T_set_gplus_fieldCB','theme_3T.com','theme3T-set-section'); //Gplus
}

function theme3T_set_register_saniCB($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@',"",$output);
    return $output;
} //Twitter Sanitize CB

function theme3T_set_sectionCB(){
    echo 'Customize your sidebar options';
} //Section CB

function theme3T_set_fieldCB(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" placeholder="First Name" name="first_name" value="'.$firstName.'">
    <input type="text" placeholder="Last Name" name="last_name" value="'.$lastName.'">';
} //Full Name CB

function theme3T_set_description_fieldCB(){
    $userDes = esc_attr(get_option('user_description'));
    echo '<input type="text" placeholder="write somethings....." name="user_description" value="'.$userDes.'">';
}

function theme3T_set_twitter_fieldCB(){
    $twitter = esc_attr(get_option('twitter_handle'));
    echo '<input type="text" placeholder="Twitter Handler" name="twitter_handle" value="'.$twitter.'"><p class="description">Input your twitter id without @ character</p>';
} //Twitter CB

function theme3T_set_facebook_fieldCB(){
    $facebook = esc_attr(get_option('facebook_handle'));
    echo '<input type="text" placeholder="Facebook Handler" name="facebook_handle" value="'.$facebook.'">';
} //Facebook CB

function theme3T_set_gplus_fieldCB(){
    $gplus = esc_attr(get_option('gplus_handle'));
    echo '<input type="text" placeholder="Google+ Handler" name="gplus_handle" value="'.$gplus.'">';
} //GPlus CB