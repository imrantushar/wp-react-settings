<?php

namespace WPRS\INC;

class Admin
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
     * Main Option Name
     */
    private $settings_name = null;

    /**
     * Slug of the plugin screen.
     *
     * @since    1.0.0
     *
     * @var      string
     */
    protected $plugin_screen_hook_suffix = null;

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

    /**
     * settings fields array
     *
     * @since 1.0.0
     */
    private $setting_array = array();

    /**
     * Initialize the plugin by loading admin scripts & styles and adding a
     * settings page and menu.
     *
     * @since     1.0.0
     */
    private function __construct()
    {
        $this->plugin_slug = WP_REACT_SETTINGS_SLUG;
        $this->version = WP_REACT_SETTINGS_VERSION;
        $this->settings_name = apply_filters('wprs_settings_name', 'wprs_setting');
        $this->setting_array = apply_filters('wprs_settings', Builder::load());
        $this->do_hooks();
    }

    /**
     * Handle WP actions and filters.
     *
     * @since     1.0.0
     */
    private function do_hooks()
    {
        // Load admin style sheet and JavaScript.
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));

        // Add the options page and menu item.
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));

        // Add plugin action link point to settings page
        add_filter('plugin_action_links_' . WP_REACT_SETTINGS_BASE_NAME, array($this, 'add_action_links'));
        register_activation_hook(WP_REACT_SETTINGS_MAIN_FILE_PATH, array($this, 'set_default_settings_fields_data'));
    }

    /**
     * Register and enqueue admin-specific style sheet.
     *
     * @since     1.0.0
     *
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_styles()
    {
        if (!isset($this->plugin_screen_hook_suffix)) {
            return;
        }
        $screen = get_current_screen();
        if ($this->plugin_screen_hook_suffix == $screen->id) {
            wp_enqueue_style($this->plugin_slug . '-style', plugins_url('assets/css/admin.css', dirname(__FILE__)), array(), $this->version);
        }
    }

    /**
     * Register and enqueue admin-specific javascript
     *
     * @since     1.0.0
     *
     * @return    null    Return early if no settings page is registered.
     */
    public function enqueue_admin_scripts()
    {
        if (!isset($this->plugin_screen_hook_suffix)) {
            return;
        }

        $screen = get_current_screen();
        if ($this->plugin_screen_hook_suffix == $screen->id) {

            wp_enqueue_script($this->plugin_slug . '-admin-script', plugins_url('assets/js/admin.js', dirname(__FILE__)), array('jquery'), $this->version);

            wp_localize_script($this->plugin_slug . '-admin-script', 'wpr_object', array(
                'api_nonce' => wp_create_nonce('wp_rest'),
                'api_url' => rest_url($this->plugin_slug . '/v1/'),
                'settings' => $this->setting_array,
            ));
        }
    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu()
    {
        /*
         * Add a settings page for this plugin to the Settings menu.
         */
        $this->plugin_screen_hook_suffix = add_menu_page(
            __('WP React Settings', $this->plugin_slug),
            __('WP React Settings', $this->plugin_slug),
            'manage_options',
            $this->plugin_slug,
            array($this, 'display_plugin_admin_page')
        );
    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */
    public function display_plugin_admin_page()
    {
?>
        <div id="wprs-admin-root" class="wprs-admin-root"></div>
<?php
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */
    public function add_action_links($links)
    {
        return array_merge(
            array(
                'settings' => '<a href="' . admin_url('options-general.php?page=' . $this->plugin_slug) . '">' . __('Settings', $this->plugin_slug) . '</a>',
            ),
            $links
        );
    }

    /**
     * Set default settings data in database
     * 
     * @return null save option in database
     * 
     * @since 1.0.0
     */
    public function set_default_settings_fields_data()
    {
        $list_column = array_column($this->setting_array, 'fields');
        $list_array = array_merge(...$list_column);
        $new_value = \json_encode(wp_list_pluck($list_array, 'default', 'id'));

        if (get_option($this->settings_name) !== false) {
            update_option($this->settings_name, $new_value);
        } else {
            add_option($this->settings_name, $new_value);
        }
    }
}
