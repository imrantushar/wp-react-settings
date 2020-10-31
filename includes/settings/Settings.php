<?php

namespace WPRS\SETTINGS;


class Settings
{
    /**
     * Setup instance attributes
     *
     * @since     1.0.0
     */
    public function __construct()
    {
        $this->load_dependancy_instance();
        // add_action('wprs_save_default_option_value',  'default_option_value');
    }



    /**
     * Load Dependancy Instance
     *
     * @since 1.0.0
     */
    public function load_dependancy_instance()
    {
        $menu = new Menu();
        $menu->init();
        new Assets();
        new Endpoint();
    }
}
