<div class="wrapper">
    <h1>Alecadd Plugin</h1>
    <?php settings_errors(); ?>
    <form method="POST" action="options.php">
        <?php
        settings_fields('alecaddd_options_group');
        do_settings_sections('Alecaddd-plugin');
        submit_button();
        ?>
    </form>
</div>