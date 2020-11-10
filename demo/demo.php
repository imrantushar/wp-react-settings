<?php

add_action('wprs_build_settings', 'wprs_build_settings_callback');
function wprs_build_settings_callback($config)
{

    // build settings
    $config::add_tab([
        'title' => __('Basic Fields', 'wp-react-settings'),
        'id' => 'basic_fields',
    ]);
    $config::add_field('basic_fields', [
        'id' => 'textfield',
        'type' => 'text',
        'title' => __('Text', 'wp-react-settings'),
        'subtitle' => __('Field Sub Title', 'wp-react-settings'),
        'desc' => __('Field Description', 'wp-react-settings'),
        'default' => 'Default Text',
    ]);
    $config::add_field('basic_fields', [
        'id' => 'emailfield',
        'type' => 'email',
        'title' => __('Email', 'wp-react-settings'),
        'subtitle' => __('Field Sub Title', 'wp-react-settings'),
        'desc' => __('Field Description', 'wp-react-settings'),
        'default' => 'someone@example.com',
    ]);
    $config::add_field('basic_fields', [
        'id' => 'textareafield',
        'type' => 'textarea',
        'title' => __('Textarea', 'wp-react-settings'),
        'subtitle' => __('Field Sub Title', 'wp-react-settings'),
        'desc' => __('Field Description', 'wp-react-settings'),
        'default' => 'Default Textarea',
    ]);
    $config::add_field('basic_fields', [
        'id' => 'checkboxfield',
        'type' => 'checkbox',
        'title' => __('Checkbox', 'wp-react-settings'),
        'subtitle' => __('Field Sub Title', 'wp-react-settings'),
        'desc' => __('Field Description', 'wp-react-settings'),
        'default' => true, // 1 = on | 0 = off
    ]);
    $config::add_field('basic_fields', [
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
    $config::add_field('basic_fields', [
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
    // collapsible field
    $config::add_field('basic_fields', [
        'id' => 'collapible_field',
        'type' => 'collapsible',
        'title' => __('Collapsible Field Example', 'wprs'),
        'default' => false,
    ]);
    $config::add_field('basic_fields', [
        'id' => 'adminbar_sp_list_structure_template',
        'type' => 'text',
        'title' => __('Item template:', 'wprs'),
        'default'   => '<strong>%TITLE%</strong> / %AUTHOR% / %DATE%',
        'condition' => [
            'collapible_field' => true,
        ],
    ]);
    $config::add_field('basic_fields', [
        'id' => 'adminbar_sp_list_structure_title_length',
        'type' => 'text',
        'title' => __('Title length:', 'wprs'),
        'default'   => '45',
        'condition' => [
            'collapible_field' => true,
        ],
    ]);
    $config::add_field('basic_fields', [
        'id' => 'adminbar_sp_list_structure_date_format',
        'type' => 'text',
        'title' => __('Date format:', 'wprs'),
        'default'   => 'M-d h:i:a',
        'desc'   => __('For item template use %TITLE% for post title, %AUTHOR% for post author and %DATE% for post scheduled date-time. You can use HTML tags with styles also', 'wprs'),
        'condition' => [
            'collapible_field' => true,
        ]
    ]);
}
