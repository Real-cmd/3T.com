<h1>3T.com Sidebar Options</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
    <?php settings_fields('theme3T-set-register') ?>
    <?php do_settings_sections('theme_3T.com') ?>
    <?php submit_button(); ?>
</form>