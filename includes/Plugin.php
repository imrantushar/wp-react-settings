<?php
namespace WPRS\INC;

class Plugin
{

    /**
     * The variable name is used as the text domain when internationalizing strings
     * of text. Its value should match the Text Domain file header in the main
     * plugin file.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_slug = 'wp-react-settings';

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
        $this->plugin_version = WP_REACT_SETTINGS_VERSION;
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
        include wp_REACT_SETTINGS_ROOT_DIR . 'sample/sample-config.php';
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
     * Return the plugin slug.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_slug()
    {
        return $this->plugin_slug;
    }

    /**
     * Return the plugin version.
     *
     * @since    1.0.0
     *
     * @return    Plugin slug variable.
     */
    public function get_plugin_version()
    {
        return $this->plugin_version;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        add_option('wprs_simple_setting');
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
