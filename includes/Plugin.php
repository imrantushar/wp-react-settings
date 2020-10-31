<?php


namespace WPRS;

include plugin_dir_path(__FILE__) . 'settings/Settings.php';
include plugin_dir_path(__FILE__) . 'settings/Config.php';
include plugin_dir_path(__FILE__) . 'settings/Menu.php';
include plugin_dir_path(__FILE__) . 'settings/Assets.php';
include plugin_dir_path(__FILE__) . 'settings/Endpoint.php';
include plugin_dir_path(__FILE__) . 'settings/Builder.php';
include plugin_dir_path(__FILE__) . 'settings/Data.php';

use WPRS\SETTINGS\Settings;

final class Plugin
{
    /**
     * Instance of this class.
     *
     * @since    1.0.0
     *
     * @var      object
     */
    protected static $instance = null;

    private function __construct()
    {
        new Settings();
    }


    /**
     * Return an instance of this class.
     *
     * @since     1.0.0
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance()
    {
        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
