<?php

namespace WPRS;

class Builder
{
    public static $tabs = array();
    public static $fields = array();

    public static function get_settings()
    {
        return self::build_settings(self::$tabs, self::$fields);
    }

    public static function add_tab($tab)
    {
        if (!is_array($tab)) {
            return false;
        }
        return self::$tabs[$tab['id']] = $tab;
    }
    public static function add_field($tabname, $fields)
    {
        return self::$fields[$tabname][]  = $fields;
    }

    // group
    public static function add_group($tab, $group)
    {
        self::$tabs[$tab]['group'][$group['id']] = $group;
    }
    public static function add_group_field($tab, $group_id, $fields)
    {
        return self::$tabs[$tab]['group'][$group_id]['fields'][]  = $fields;
    }


    public static function build_settings($tabs, $fields)
    {
        foreach ($fields as $key => $value) {
            $tabs[$key]['fields'] = $value;
        }
        return array_values($tabs);
    }
}
