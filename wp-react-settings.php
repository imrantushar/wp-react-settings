<?php

/**
 * Plugin Name:       WP-React-Settings
 * Plugin URI:        https://itushar.me/wp-react-settings
 * Description:       A Simple wordpress settings option based on Reactjs
 * Version:           0.1
 * Author:            Tushar Imran
 * Author URI:        https://itushar.me/
 * Text Domain:       wprs
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('WP_REACT_SETTINGS_MAIN_FILE_PATH', __FILE__);

/**
 * Include Plugin Main Class
 *
 * @since 1.0.0
 */

include plugin_dir_path(__FILE__) . 'includes/Plugin.php';

/**
 * Initialize Plugin
 *
 * @since 1.0.0
 */
function Plugin_Core_Loaded()
{
    return WPRS\INC\Plugin::get_instance();
}
$GLOBALS['WPRS'] = Plugin_Core_Loaded();
