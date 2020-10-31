<?php

namespace WPRS\SETTINGS;

use WPRS\SETTINGS\Config;

class Menu
{
    use Config;

    public function init()
    {
        add_action('admin_menu', array($this, 'add_plugin_admin_menu'));
    }

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */
    public function add_plugin_admin_menu()
    {
        add_menu_page(
            $this->pageTitle,
            $this->pageTitle,
            'manage_options',
            $this->pageSlug,
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
        echo '<div id="wprs-admin-root" class="wprs-admin-root"></div>';
    }
}
