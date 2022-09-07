<?php

namespace Styx\Style\Parsers;

class Padding extends BaseParser
{

    public static $default = array(
        'padding-left' => '',
        'padding-right' => '',
        'padding-top' => '',
        'padding-bottom' => '',
    );

    public static function parse($data = array()) {
        $data = array_merge(static::$default, $data);

        $properties = [];
        foreach (static::$default as $propertyKey => $defaultValue) {
            if (isset($data[$propertyKey]) && $data[$propertyKey]) {
                $properties[$propertyKey] = $data[$propertyKey];
            }
        }

        return $properties;

    }
}