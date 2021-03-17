<?php
/*
 * @package 3T.com
 * ================================
 *    Admin Enqueue Functions
 * ================================
 */

function theme3T_load_admin_scripts($hook){
if ('toplevel_page_theme_3T.com' == $hook){


    wp_register_style('theme3T_admin', get_template_directory_uri() . '/css/theme3T.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('theme3T_admin');
    //wp_enqueue_style('theme3T_admin');
    }else{
        return;
    }
}

add_action('admin_enqueue_scripts','theme3T_load_admin_scripts');