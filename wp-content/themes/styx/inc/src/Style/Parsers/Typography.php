<?php

namespace Styx\Style\Parsers;

class Typography extends BaseParser
{

    public static $default = array(
        'font-family'    => '',
        'variant'        => '',
        'font-size'      => '',
        'line-height'    => '',
        'letter-spacing' => '',
        'color'          => '',
        'text-transform' => '',
        'text-align'     => '',
    );

    public static function parse($data = array()) {
        $data = array_merge(static::$default, $data);

        $properties = [];
        foreach(static::$default as $propertyKey => $defaultValue) {
            if(isset($data[$propertyKey]) && $data[$propertyKey]) {
                $properties[$propertyKey] = $data[$propertyKey];
            }
        }

        return $properties;

    }
}