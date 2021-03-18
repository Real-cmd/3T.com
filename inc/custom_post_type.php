<?php
/*
 * @package 3T.com
 * ================================
 *             Custom Contact Page
 * ================================
 */

$contact = get_option('active_contact');
if(@$contact == 1){
    add_action('init','theme3T_custom_contact_post_type');
}

function theme3T_custom_contact_post_type(){
    $labels = array(
        'name'      => 'Messages',
        'singular_name'      => 'Message',
        'menu_name'      => 'Messages',
        'name_admin_bar'      => 'Message',
    );
    $args = array(
      'labels'      => $labels,
      'show_ui'     => true,
      'show_in_menu'     => true,
      'capability'     => 'post',
      'hierarchical'     => false,
      'menu_position'     => 26,
      'menu_icon'       =>'dashicons-email-alt',
      'supports'     => array('title','editor','author')
    );

    register_post_type('theme3t_contact',$args);
}