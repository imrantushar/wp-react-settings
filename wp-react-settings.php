<?php
/**
 * Plugin Name:       WP-React-Settings
 * Plugin URI:        itushar.me/wp-react-settings
 * Description:       A Simple wordpress option framework
 * Version:           0.0.0
 * Author:            Tushar Imran
 * Author URI:        https://gopangolin.com
 * Text Domain:       wprs
 */

namespace WPRS;

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

define('WP_REACT_SETTINGS_VERSION', '1.0.0');
define('WP_REACT_SETTINGS_SLUG', 'wp-react-settings');
define('wp_REACT_SETTINGS_ROOT_DIR', plugin_dir_path(__FILE__));

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
    INC\Plugin::get_instance();
}
add_action('plugins_loaded', 'WPRS\Plugin_Core_Loaded');
