<h1>3T.com Sidebar Options</h1>
<?php settings_errors(); ?>
<?php
$profile = esc_attr(get_option('profile_picture'));
$firstName = esc_attr(get_option('first_name'));
$lastName = esc_attr(get_option('last_name'));
$fullName = $firstName . ' ' . $lastName;
$userDes = esc_attr(get_option('user_description'));
?>

<div class="theme3T_sidebar_preview">
    <div class="theme3T_sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $profile ?>;)"></div>
        </div>
        <h1 class="theme3T_username"><?php print $fullName ?></h1>
        <h2 class="theme3T_description"><?php print $userDes ?></h2>
        <div class="icon_wrapper">

        </div>
    </div>
</div>

<form action="options.php" method="post" class="theme3T_general_form">
    <?php settings_fields('theme3T-set-register') ?>
    <?php do_settings_sections('theme_3T.com') ?>
    <?php submit_button('Save Changes','primary','btnSubmit'); ?>
</form>