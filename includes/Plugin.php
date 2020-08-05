<?php

namespace WPRS\INC;

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

    /**
     * Setup instance attributes
     *
     * @since     1.0.0
     */
    private function __construct()
    {
        $this->define_constants();
        $this->load_dependancy();
        $this->load_dependancy_instance();
    }

    /**
     * Load dependancy
     *
     * @since 1.0.0
     */
    public function load_dependancy()
    {
        include plugin_dir_path(__FILE__) . 'Admin.php';
        include plugin_dir_path(__FILE__) . 'rest-api/Endpoint.php';
        include plugin_dir_path(__FILE__) . 'Builder.php';
        include WP_REACT_SETTINGS_ROOT_DIR . 'sample/sample-config.php';
    }

    /**
     * Load Dependancy Instance
     *
     * @since 1.0.0
     */
    public function load_dependancy_instance()
    {
        Admin::get_instance();
        RESTAPI\Endpoint::get_instance();
    }

    /**
     * Define WPRS Constant
     * @since 1.0.0
     */
    private function define_constants()
    {
        $this->define('WP_REACT_SETTINGS_VERSION', '1.0.0');
        $this->define('WP_REACT_SETTINGS_SLUG', 'wp-react-settings');
        $this->define('WP_REACT_SETTINGS_ROOT_DIR', plugin_dir_path(WP_REACT_SETTINGS_MAIN_FILE_PATH));
        $this->define('WP_REACT_SETTINGS_BASE_NAME', plugin_basename(WP_REACT_SETTINGS_MAIN_FILE_PATH));
    }

    /**
     * Define constant if not already set.
     *
     * @param string      $name  Constant name.
     * @param string|bool $value Constant value.
     * @since 1.0.0
     */
    private function define($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
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
