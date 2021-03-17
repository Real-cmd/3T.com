<h1>3T.com Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
$firstName = esc_attr(get_option('first_name'));
$lastName = esc_attr(get_option('last_name'));
$fullName = $firstName . ' ' . $lastName;
$userDes = esc_attr(get_option('user_description'));
?>

<div class="theme3T_sidebar_preview">
    <div class="theme3T_sidebar">
        <h1 class="theme3T_username"><?php print $fullName ?></h1>
        <h2 class="theme3T_description"><?php print $userDes ?></h2>
        <div class="icon_wrapper">

        </div>
    </div>
</div>


<form action="options.php" method="post">
    <?php settings_fields('theme3T-set-register') ?>
    <?php do_settings_sections('theme_3T.com') ?>
    <?php submit_button(); ?>
</form>