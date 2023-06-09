<div class="wrap">
    <h1>Réglade de test Jojo</h1>

    <form method="post" action="options.php">
        <?php settings_fields('test_general'); ?>
        <?php do_settings_sections('jojoslug'); ?>
       <?php submit_button(); ?>
</div>