<?php

function _themename_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', [
        // 'settings' => [],
        'selector' => '.c-header__blogname',
        'container_inclusive' => false,
        'render_callback' => function () {
            bloginfo('name');
        },
    ]);

    /*################## GENERAL SETTINGS ########################*/
    $wp_customize->add_section('_themename_general_options', [
        'title' => esc_html__('General Options', '_themename'),
        'description' => esc_html__(
            'You can change general options from here.',
            '_themename'
        ),
    ]);

    $wp_customize->add_setting('_themename_accent_colour', [
        'default' => '#20ddae',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            '_themename_accent_colour',
            [
                'label' => __('Accent Color', '_themename'),
                'section' => '_themename_general_options',
            ]
        )
    );

    /*################## FOOTER SETTINGS ########################*/

    $wp_customize->selective_refresh->add_partial('_themename_footer_partial', [
        'settings' => [
            '_themename_site_info',
            '_themename_footer_bg',
            '_themename_footer_layout',
        ],
        'selector' => '#footer',
        'container_inclusive' => false,
        'render_callback' => function () {
            get_template_part('template-parts/footer/widgets');
            get_template_part('template-parts/footer/info');
        },
    ]);

    $wp_customize->add_section('_themename_footer_options', [
        'title' => esc_html__('Footer Options', '_themename'),
        'description' => esc_html__(
            'You can change footer options from here.',
            '_themename'
        ),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('_themename_site_info', [
        'default' => '',
        'sanitize_callback' => '_themename_sanitize_site_info',
        'transport' => 'postMessage',
    ]);
    $wp_customize->add_control('_themename_site_info', [
        'type' => 'text',
        'label' => esc_html__('Site Info', '_themename'),
        'section' => '_themename_footer_options',
    ]);

    $wp_customize->add_setting('_themename_footer_bg', [
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => '_themename_sanitize_footer_bg',
    ]);
    $wp_customize->add_control('_themename_footer_bg', [
        'type' => 'select',
        'label' => esc_html__('Footer Background', '_themename'),
        'choices' => [
            'dark' => esc_html__('dark', '_themename'),
            'light' => esc_html__('light', '_themename'),
        ],
        'section' => '_themename_footer_options',
    ]);

    $wp_customize->add_setting('_themename_footer_layout', [
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => '_themename_validate_footer_layout',
    ]);

    $wp_customize->add_control('_themename_footer_layout', [
        'type' => 'text',
        'label' => esc_html__('Footer Layout', '_themename'),
        'section' => '_themename_footer_options',
    ]);
}

function _themename_validate_footer_layout($validity, $value)
{
    if (!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add(
            'invalid_footer_layout',
            esc_html__('Footer layout is invalid', '_themename')
        );
    }
    return $validity;
}

add_action('customize_register', '_themename_customize_register');

function _themename_sanitize_footer_bg($input)
{
    $valid = ['light', ' dark'];
    if (in_array($input, $valid, true)) {
        return $input;
    }
    return 'dark';
}

function _themename_sanitize_site_info($input)
{
    $allowed = [
        'a' => [
            'href' => [],
            'title' => [],
        ],
    ];
    return wp_kses($input, $allowed);
}

?>
