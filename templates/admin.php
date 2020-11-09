<div class="wrap">
    <h1>%PLUGIN_NAME%</h1>
    <?php settings_errors(); ?>



    <form method="post" action="options.php">
        <?php
        settings_fields( '%PLUGIN_SLUG_UNDERSCORE%_settings' );
        do_settings_sections( '%PLUGIN_SLUG_UNDERSCORE%' );
        submit_button();
        ?>
    </form>


</div>