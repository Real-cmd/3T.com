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
    add_submenu_page('theme_3T.com','Theme Sidebar Options','Sidebar','manage_options','theme_3T.com','theme_admin_CB');

    /*====for Custom Theme option Submenu Page====*/
    // add_submenu_page('Parent Slug','Page Title','Menu Title','Capability','Menu Slug','CB Functions');
    add_submenu_page('theme_3T.com','Theme Custom Options','Theme Option','manage_options','theme_3T.com_theme','theme_admin_Custom_themeCB');

    /*====for Custom CSS Submenu Page====*/
    // add_submenu_page('Parent Slug','Page Title','Menu Title','Capability','Menu Slug','CB Functions');
    add_submenu_page('theme_3T.com','Theme Css Options','Custom CSS','manage_options','theme_3T.com_css','theme_admin_Custom_cssCB');

    // Activate Custom Settings
    add_action('admin_init','theme_3T_custom_settings');
}
add_action('admin_menu','theme_add_admin_page');



function theme_3T_custom_settings(){

    /*================================================
 *      First Submenu( Side Bar Option )
    =================================================*/

    register_setting('theme3T-set-register','profile_picture'); // Profile Picture
    register_setting('theme3T-set-register','first_name'); // First name
    register_setting('theme3T-set-register','last_name'); // Last name
    register_setting('theme3T-set-register','user_description'); // User Description
    register_setting('theme3T-set-register','twitter_handle','theme3T_set_register_twitter_saniCB'); // Twitter
    register_setting('theme3T-set-register','facebook_handle'); // Facebook
    register_setting('theme3T-set-register','gplus_handle'); // GPlus

    add_settings_section('theme3T-set-section','Sidebar Options','theme3T_set_sectionCB','theme_3T.com'); // Sidebar Options section

    add_settings_field('theme3T-set-field_profile','Profile Picture','theme3T_set_profile_fieldCB','theme_3T.com','theme3T-set-section'); //Full Name
    add_settings_field('theme3T-set-field','Full Name','theme3T_set_fieldCB','theme_3T.com','theme3T-set-section'); //Full Name
    add_settings_field('theme3T-set-field_description','Description','theme3T_set_description_fieldCB','theme_3T.com','theme3T-set-section'); //Full Name
    add_settings_field('theme3T-set-field_twitter','Twitter Handle','theme3T_set_twitter_fieldCB','theme_3T.com','theme3T-set-section'); //Twitter
    add_settings_field('theme3T-set-field_facebook','Facebook Handle','theme3T_set_facebook_fieldCB','theme_3T.com','theme3T-set-section'); //Facebook
    add_settings_field('theme3T-set-field_googleplus','Google+ Handler','theme3T_set_gplus_fieldCB','theme_3T.com','theme3T-set-section'); //Gplus


    /*================================================
 *          Second Submenu( Theme Option )
    =================================================*/

    register_setting('theme3T-set-register-options','post_formats');
    register_setting('theme3T-set-register-options','custom_header');
    register_setting('theme3T-set-register-options','custom_background');

    add_settings_section('theme3T-set-section-options','Theme Options','theme3T_set_options_sectionCB','theme_3T.com_theme');

    add_settings_field('theme3T-set-field_post','Post Formats','theme3T_set_postformats_fieldCB','theme_3T.com_theme','theme3T-set-section-options');
    add_settings_field('theme3T-set-field_header','Custom Headers','theme3T_set_header_fieldCB','theme_3T.com_theme','theme3T-set-section-options');
    add_settings_field('theme3T-set-field_background','Custom Background','theme3T_set_background_fieldCB','theme_3T.com_theme','theme3T-set-section-options');


}
/*================================================
 *      First Submenu( Side Bar Option )
 =================================================*/

function theme_admin_CB(){
    require_once (get_template_directory() . '/inc/template/theme_admin_template.php');
} // Main SubMenu CB (1st)

function theme_admin_Custom_themeCB(){
    require_once (get_template_directory() . '/inc/template/theme_option_admin_template.php');
} // Main SubMenu CB (2nd)

function theme_admin_Custom_cssCB(){
    echo '<h3>Mithu Khan CSS</h3>';
} // Main SubMenu CB (3rd)

function theme3T_set_sectionCB(){
    echo 'Customize your sidebar options';
} //Main Section CB

function theme3T_set_profile_fieldCB(){
    $profile = esc_attr(get_option('profile_picture'));
    if(empty($profile)){
        echo '<input type="button" id="upload-button" class="button button-secondary" value="Profile Picture"/><input type="hidden" id="profile-picture" name="profile_picture" value=""/>';
    }else{
        echo '<input type="button" id="upload-button" class="button button-secondary" value="Replace Profile Picture"/>
<input type="hidden" id="profile-picture" name="profile_picture" value="'.$profile.'"/>
<input type="button" class="button button-secondary" value="Remove" id="remove-picture"/>';
    }
} //Profile Picture CB

function theme3T_set_fieldCB(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" placeholder="First Name" name="first_name" value="'.$firstName.'">
    <input type="text" placeholder="Last Name" name="last_name" value="'.$lastName.'">';
} //Full Name CB

function theme3T_set_description_fieldCB(){
    $userDes = esc_attr(get_option('user_description'));
    echo '<input type="text" placeholder="write somethings....." name="user_description" value="'.$userDes.'"><p class="description">Write somethings about yourself</p>';
} //Description CB

function theme3T_set_twitter_fieldCB(){
    $twitter = esc_attr(get_option('twitter_handle'));
    echo '<input type="text" placeholder="Twitter Handler" name="twitter_handle" value="'.$twitter.'"><p class="description">Input your twitter id without @ character</p>';
} //Twitter CB

function theme3T_set_register_twitter_saniCB($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@',"",$output);
    return $output;
} //Twitter Sanitize CB

function theme3T_set_facebook_fieldCB(){
    $facebook = esc_attr(get_option('facebook_handle'));
    echo '<input type="text" placeholder="Facebook Handler" name="facebook_handle" value="'.$facebook.'">';
} //Facebook CB

function theme3T_set_gplus_fieldCB(){
    $gplus = esc_attr(get_option('gplus_handle'));
    echo '<input type="text" placeholder="Google+ Handler" name="gplus_handle" value="'.$gplus.'">';
} //GPlus CB

/*================================================
 *      Second Submenu( Theme Option ) CB
 =================================================*/

function theme3T_set_options_sectionCB(){
    echo 'Activate and Deactivate Your Theme Support options';
} //Main Section CB

function theme3T_set_postformats_fieldCB(){
    $options = get_option('post_formats');
    $formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
    $output = '';
    foreach ($formats as $format){
        $checked = ( @$options[$format] == 1 ? 'checked' : '' );
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'/>'.$format.'</label><br>';
    }
    echo $output;
} // post formats CB

function theme3T_set_header_fieldCB(){
    $options = get_option('custom_header');
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/>Activate the Custom Header</label><br>';
}

function theme3T_set_background_fieldCB(){
    $options = get_option('custom_background');
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/>Activate the Custom Background</label><br>';
}