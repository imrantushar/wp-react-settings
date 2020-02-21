<?php

add_filter('wprs_fields', 'wprs_add_settings_fields');
function wprs_add_settings_fields($fields)
{
    return array(
        array(
            'title'            => __( 'Basic Fields', 'wprs' ),
            'id'               => 'basic',
            'desc'             => __( 'These are really basic fields!', 'wprs' ),
            'customizer_width' => '400px',
            'icon'             => 'el el-home',
            'fields' => array(
                array(
                    'id' => 'firstName',
                    'type' => 'text',
                    'title' => __('First Name', 'wprs'),
                    'subtitle' => __('No validation can be done on this field type', 'wprs'),
                    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
                    'default' => 'john', 
                ),
                array(
                    'id' => 'info',
                    'type' => 'textarea',
                    'title' => __('Info', 'wprs'),
                    'subtitle' => __('No validation can be done on this field type', 'wprs'),
                    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
                    'default' => 'john', 
                )
            ),
        ),
        array(
            'title' => __('Sub Section', 'wprs'),
            'id' => 'basic',
            'icon' => 'el el-home',
            'fields' => array(
                array(
                    'id' => 'lastName',
                    'type' => 'text',
                    'title' => __('Last Name', 'wprs'),
                    'subtitle' => __('No validation can be done on this field type', 'wprs'),
                    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
                    'default' => 'Deo', // 1 = on | 0 = off
                ),
                array(
                    'id' => 'email',
                    'type' => 'email',
                    'title' => __('Email', 'wprs'),
                    'subtitle' => __('No validation can be done on this field type', 'wprs'),
                    'desc' => __('This is the description field, again good for additional info.', 'wprs'),
                    'default' => 'example@gmail.com', // 1 = on | 0 = off
                ),
            ),
        ),
    );
}