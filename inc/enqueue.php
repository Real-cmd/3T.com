<?php
/*
 * @package 3T.com
 * ================================
 *    Admin Enqueue Functions
 * ================================
 */

function theme3T_load_admin_script(){

    wp_enqueue_style('theme3T_admin', get_template_directory_uri() . '/css/theme3T.admin.css', array(), '1.0.0', 'all');
    //wp_enqueue_style('theme3T_admin');
}

add_action('admin_enqueue_scripts','theme3T_load_admin_script');