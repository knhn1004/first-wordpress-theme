<?php

function _themename_assets()
{
    wp_enqueue_style(
        '_themename-style',
        get_template_directory_uri() . '/dist/assets/css/bundle.css',
        [],
        '1.0.0',
        'all'
    );

    include get_template_directory() . '/lib/inline-css.php';
    wp_add_inline_style('_themename-style', $inline_styles);

    wp_enqueue_script(
        '_themename-scripts',
        get_template_directory_uri() . '/dist/assets/js/bundle.js',
        ['jquery'],
        '1.0.0',
        true
    );
}

add_action('wp_enqueue_scripts', '_themename_assets');

function _themename_admin_assets()
{
    wp_enqueue_style(
        '_themename-style',
        get_template_directory_uri() . '/dist/assets/css/admin.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_script(
        '_themename-admin-scripts',
        get_template_directory_uri() . '/dist/assets/js/admin.js',
        [],
        '1.0.0',
        true
    );
}

add_action('admin_enqueue_scripts', '_themename_admin_assets');

function _themename_customize_preview_js()
{
    wp_enqueue_script(
        '_themename-cutomize-preview',
        get_template_directory_uri() . '/dist/assets/js/customize-preview.js',
        ['customize-preview', 'jquery'],
        '1.0.0',
        true
    );

    include get_template_directory() . '/lib/inline-css.php';
    wp_localize_script('_themename-cutomize-preview', '_themename', [
        'inline-css' => $inline_styles_selectors,
    ]);
}

add_action('customize_preview_init', '_themename_customize_preview_js');

?>
