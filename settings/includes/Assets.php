<?php

namespace WPRS;

class Assets
{
    use Config;

    public $setting_array = [];

    public function __construct($settings)
    {
        $this->setting_array =  $settings;
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
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
        wp_enqueue_style($this->pageSlug . '-style', plugins_url('assets/css/admin.css', dirname(__FILE__)), array(), $this->version);
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
        wp_enqueue_script($this->pageSlug . '-admin-script', plugins_url('assets/js/admin.js', dirname(__FILE__)), array('jquery'), $this->version);
        wp_localize_script($this->pageSlug . '-admin-script', 'wpr_object', array(
            'api_nonce' => wp_create_nonce('wp_rest'),
            'api_url' => rest_url($this->pageSlug . '/v1/'),
            'settings' => $this->setting_array,
        ));
    }
}
