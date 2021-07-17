<?php

require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';
add_action('tgmpa_register', '_themename_register_required_plugins');

function _themename_register_required_plugins()
{
    $plugins = [
        [
            'name' => '_themename metaboxes',
            'slug' => '_themename-metaboxes',
            'src' =>
                get_template_directory_uri() .
                './lib/plugins/_themename-metaboxes.zip',
            'required' => true,
            'version' => '1.0.0',
            'force_activation' => false,
            'force_deactivation' => false,
        ],
    ];
    $config = [];
    tgmpa($plugins, $config);
}

?>
