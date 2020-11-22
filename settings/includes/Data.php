<?php

namespace WPRS;

class Data
{
    public $setting_array = [];
    public $settings;
    public $option;

    public function __construct($option, $settings)
    {
        $this->option = $option;
        $this->setting_array =  $settings;
    }
    /**
     * Set default settings data in database
     *
     * @return null save option in database
     *
     * @since 1.0.0
     */
    public function save_option_value()
    {
        $field = array();
        foreach ($this->setting_array as $setting_item) {
            if (!isset($setting_item['group'])) {
                //normal field
                if (isset($setting_item['fields'])) {
                    foreach ($setting_item['fields'] as $fieldItem) {
                        $field[$fieldItem['id']] = $fieldItem['default'];
                    }
                }
            } else {
                // group field
                foreach ($setting_item['group'] as $groupKey => $groupItem) {
                    $group = [];
                    if (isset($groupItem['fields'])) {
                        foreach ($groupItem['fields'] as $groupField) {
                            $group[][$groupField['id']] = (isset($groupField['default']) ? $groupField['default'] : '');
                        }
                    }
                    $field[$setting_item['id']][$groupKey] = $group;
                }
            }
        }

        if (get_option($this->option) !== false) {
            $defaults = json_decode(get_option($this->option), true);
            $args = wp_parse_args($defaults, $field);
            update_option($this->option, json_encode($args));
        } else {
            add_option($this->option, json_encode($field));
        }
    }
}
