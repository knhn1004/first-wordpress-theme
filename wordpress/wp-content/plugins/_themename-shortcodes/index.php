<?php
/*
Plugin Name: _themename _pluginname
Plugin URI:
Description: Adding Shortcodes for _themename
Version: 1.0.0
Author: Chiahong Chou
Author URI: https://chunhongweb.com
License: MIT
Text Domain: _themename-pluginname
Domain Path: /languages
*/

if (!defined('WPINC')) {
    die();
}

function _themename__pluginname_init()
{
    include_once 'includes/shortcodes/button/button.php';
}

add_action('init', '_themename__pluginname_init');

include_once 'includes/enqueue-assets.php';

?>
