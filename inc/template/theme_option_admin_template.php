<h1>3T.com Theme Options</h1>
<?php settings_errors(); ?>
<?php
// $profile = esc_attr(get_option('profile_picture'));
?>

<form action="options.php" method="post" class="theme3T_general_form">
    <?php settings_fields('theme3T-set-register-options') ?>
    <?php do_settings_sections('theme_3T.com_theme') ?>
    <?php submit_button(); ?>
</form>