<?php

// add_submenu_page('Parent Slug','Page Title','Menu Title','Capability','Menu Slug','CB Functions');
add_submenu_page('theme_3T.com','Theme Css Options','Custom CSS','manage_options','theme_3T.com_css','theme_admin_Custom_cssCB');


function theme_admin_Custom_cssCB(){
    echo '<h3>Mithu Khan CSS</h3>';
}
