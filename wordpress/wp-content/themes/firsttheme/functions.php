<?php
require_once 'lib/helpers.php';
require_once 'lib/customize.php';
require_once 'lib/enqueue-assets.php';
require_once 'lib/sidebars.php';
require_once 'lib/theme-support.php';
require_once 'lib/navigation.php';
require_once 'lib/delete-post.php';
require_once 'lib/include-plugins.php';
require_once 'lib/comment-callback.php';
// require_once 'lib/metaboxes.php';

function _themename_button($atts)
{
    extract(
        shortcode_atts(
            [
                'color' => 'red',
                'text' => 'Button',
            ],
            $atts
        )
    );
    return '<button style="background-color: ' .
        esc_attr($color) .
        '">' .
        esc_html__($text) .
        '</button>';
}

add_shortcode('_themename_button', '_themename_button');

function _themename_icon($atts)
{
    extract(
        shortcode_atts(
            [
                'icon' => '',
            ],
            $atts
        )
    );
    return '<i class="' . esc_attr($icon) . '" aria-hidden></i>';
}

add_shortcode('_themename_icon', '_themename_icon');

?>
