<?php
// set option name
add_filter('wprs_settings_name', 'wprs_set_settings_option_name');
function wprs_set_settings_option_name()
{
    return 'wprs_simple_demo';
}

// build settings
WPRS\INC\Builder::add_tab([
    'title' => __('Basic Fields', 'wp-react-settings'),
    'id' => 'basic_fields',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'textfield',
    'type' => 'text',
    'title' => __('Text', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => 'Default Text',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'emailfield',
    'type' => 'email',
    'title' => __('Email', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => 'someone@example.com',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'textareafield',
    'type' => 'textarea',
    'title' => __('Textarea', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => 'Default Textarea',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'checkboxfield',
    'type' => 'checkbox',
    'title' => __('Checkbox', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => true, // 1 = on | 0 = off
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'radiofield',
    'type' => 'radio',
    'title' => __('Radio', 'rwprs'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'options' => array(
        '1' => 'Opt 1',
        '2' => 'Opt 2',
        '3' => 'Opt 3',
    ),
    'default' => '2',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'selectfield',
    'type' => 'select',
    'title' => __('Select', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => 'yellow',
    'options' => [
        'red' => 'red color',
        'yellow' => 'Yellow Color',
        'blue' => 'Blue Color',
    ],
]);

// second tab
WPRS\INC\Builder::add_tab([
    'title' => __('Conditional Fields', 'wp-react-settings'),
    'id' => 'conditional_fields',
]);
WPRS\INC\Builder::add_field('conditional_fields', [
    'id' => 'showuserbio',
    'type' => 'checkbox',
    'title' => __('Show User Bio', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => false,
]);
WPRS\INC\Builder::add_field('conditional_fields', [
    'id' => 'userbioinfo',
    'type' => 'textarea',
    'title' => __('Textarea', 'wp-react-settings'),
    'subtitle' => __('Field Sub Title', 'wp-react-settings'),
    'desc' => __('Field Description', 'wp-react-settings'),
    'default' => 'lorem ipsum dolor',
    'condition' => [
        'showuserbio' => false,
    ],
]);
