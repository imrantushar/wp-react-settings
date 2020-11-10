<?php

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

final class Settings
{
    protected $builder;
    protected $settings;
    protected $data;
    /**
     * Setup instance attributes
     *
     * @since     1.0.0
     */
    public function __construct()
    {
        new WPRS\Menu();
        new WPRS\Endpoint();
        $this->builder = new WPRS\Builder();
        do_action('wprs_build_settings', $this->builder);
        $this->settings = $this->builder->get_settings();
        $this->data  = new WPRS\Data($this->settings);
        new WPRS\Assets($this->settings);
        add_action('wprs_save_default_settings', array($this->data, 'save_option_value'));
    }
}
