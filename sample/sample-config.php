<?php
WPRS\INC\Builder::add_tab([
    'title'            => __('Basic Fields', 'wprs'),
    'id'               => 'basic_fields',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'textfield',
    'type' => 'text',
    'title' => __('Text', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => 'Default Text',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'emailfield',
    'type' => 'email',
    'title' => __('Email', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => 'someone@example.com',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'textareafield',
    'type' => 'textarea',
    'title' => __('Textarea', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => 'Default Textarea',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'checkboxfield',
    'type' => 'checkbox',
    'title' => __('Checkbox', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => true, // 1 = on | 0 = off
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id'       => 'radiofield',
    'type'     => 'radio',
    'title'    => __('Radio', 'rwprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'options'  => array(
        '1' => 'Opt 1',
        '2' => 'Opt 2',
        '3' => 'Opt 3'
    ),
    'default'  => '2',
]);
WPRS\INC\Builder::add_field('basic_fields', [
    'id' => 'selectfield',
    'type' => 'select',
    'title' => __('Select', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => 'yellow',
    'options' => [
        'red'   => 'red color',
        'yellow' => 'Yellow Color',
        'blue'   => 'Blue Color'
    ]
]);

// second tab
WPRS\INC\Builder::add_tab([
    'title' => __('Conditional Fields', 'wprs'),
    'id' => 'conditional_fields',
]);
WPRS\INC\Builder::add_field('conditional_fields', [
    'id' => 'showuserbio',
    'type' => 'checkbox',
    'title' => __('Show User Bio', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => false,
]);
WPRS\INC\Builder::add_field('conditional_fields', [
    'id' => 'userbioinfo',
    'type' => 'textarea',
    'title' => __('Textarea', 'wprs'),
    'subtitle' => __('Field Sub Title', 'wprs'),
    'desc' => __('Field Description', 'wprs'),
    'default' => 'lorem ipsum dolor',
    'condition' => [
        'showuserbio'   => false
    ]
]);
