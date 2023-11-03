<?php

// Add the settings page
function voiceflow_add_settings_page() {
    add_options_page('Voiceflow Settings', 'Voiceflow', 'manage_options', 'voiceflow', 'voiceflow_render_settings_page');
}
add_action('admin_menu', 'voiceflow_add_settings_page');

// Render the settings page.
function voiceflow_render_settings_page() {
    ?>
<div class="wrap">
    <h1>Voiceflow Settings</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields('voiceflow_settings');
            do_settings_sections('voiceflow');
            submit_button();
            ?>
    </form>
</div>
<?php
}
// Register the settings.
function voiceflow_register_setting() {
    register_setting('voiceflow_settings', 'voiceflow_project_id');
    add_settings_section('voiceflow_main', 'Main Settings', null, 'voiceflow');
    add_settings_field('voiceflow_project_id', 'Project ID', 'voiceflow_render_project_id_field', 'voiceflow', 'voiceflow_main');
}

add_action( 'admin_init', 'voiceflow_register_setting' );

function voiceflow_render_project_id_field() {
    $value = get_option('voiceflow_project_id', '');
    echo '<input type="text" id="voiceflow_project_id" name="voiceflow_project_id" value="' . esc_attr($value) . '" />';
}