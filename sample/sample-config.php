<?php
WPRS\INC\Builder::add_tab([
    'title'            => __('Basic Fields', 'wprs'),
    'id'               => 'normal',
    'desc'             => __('These are really basic fields!', 'wprs'),
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
]);
WPRS\INC\Builder::add_field('normal', [
    'id' => 'firstName',
    'type' => 'text',
    'title' => __('First Name', 'wprs'),
    'subtitle' => __('No validation can be done on this field type', 'wprs'),
    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
    'default' => 'john',
]);
WPRS\INC\Builder::add_field('normal', [
    'id' => 'info',
    'type' => 'textarea',
    'title' => __('Info', 'wprs'),
    'subtitle' => __('No validation can be done on this field type', 'wprs'),
    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
    'default' => 'john',
]);
// second tab
WPRS\INC\Builder::add_tab([
    'title' => __('Sub Section', 'wprs'),
    'id' => 'basic',
    'icon' => 'el el-home',
]);
WPRS\INC\Builder::add_field('basic', [
    'id' => 'lastName',
    'type' => 'text',
    'title' => __('Last Name', 'wprs'),
    'subtitle' => __('No validation can be done on this field type', 'wprs'),
    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
    'default' => 'Deo', // 1 = on | 0 = off
]);
