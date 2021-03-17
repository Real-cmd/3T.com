<?php
/*
 * @package 3T.com
 * ================================
 *    Admin Enqueue Functions
 * ================================
 */

function theme3T_load_admin_scripts($hook){

if ('toplevel_page_theme_3T.com' == $hook){
    //wp_enqueue_style('theme3T_admin');
    wp_register_style('theme3T_admin_css', get_template_directory_uri() . '/css/theme3T.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('theme3T_admin_css');

    //wp_enqueue_media('theme3T_admin');
    wp_enqueue_media();

    //wp_enqueue_script('theme3T_admin');
    wp_register_script('theme3T_admin_js', get_template_directory_uri() . '/js/theme3T.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('theme3T_admin_js');

    }else{
        return;
    }
}

add_action('admin_enqueue_scripts','theme3T_load_admin_scripts');