<?php

/**
 * Plugin Name:       WP React Settings
 * Plugin URI:        https://itushar.me/wp-react-settings
 * Description:       A Simple WordPress Option Settings Based On Reactjs
 * Version:           0.1
 * Author:            Tushar Imran
 * Author URI:        https://itushar.me/
 * Text Domain:       wp-react-settings
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Include Plugin Main Class
 *
 * @since 1.0.0
 */

include plugin_dir_path(__FILE__) . 'settings/Settings.php';
include plugin_dir_path(__FILE__) . 'demo/demo.php';

/**
 * Initialize Plugin
 *
 * @since 1.0.0
 */
function WPRS_Plugin_Core_Loaded()
{
    return new Settings;
}
WPRS_Plugin_Core_Loaded();


function WPRS_Plugin_Core_Activated()
{
    do_action('wprs_save_default_settings');
}
register_activation_hook(__FILE__, 'WPRS_Plugin_Core_Activated');
