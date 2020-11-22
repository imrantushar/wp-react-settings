<?php

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

class Settings
{
    protected $builder;
    protected $settings;
    protected $data;
    protected $slug;
    protected $title;
    protected $option_name;
    protected $api_version;
    protected $is_development;
    /**
     * Setup instance attributes
     *
     * @since     1.0.0
     */
    public function __construct($title, $slug, $option_name, $api_version = 1, $is_development = true)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->option_name = $option_name;
        $this->api_version = $api_version;
        $this->is_development = $is_development;
        $this->load_dependency();
    }
    public function load_dependency()
    {
        new WPRS\Menu($this->title, $this->slug);
        new WPRS\Endpoint($this->slug, $this->option_name, $this->api_version);
        $this->builder = new WPRS\Builder();
        do_action('wprs_build_settings', $this->builder);
        $this->settings = $this->builder->get_settings();
        $this->data  = new WPRS\Data($this->option_name, $this->settings);
        new WPRS\Assets($this->slug, $this->settings);
        add_action('wprs_save_default_settings', array($this->data, 'save_option_value'));
    }
}
