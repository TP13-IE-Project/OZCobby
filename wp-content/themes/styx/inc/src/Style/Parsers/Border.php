<?php

namespace Styx\Style\Parsers;

class Border extends BaseParser
{

    public static $default = array(
        'width' => '',
        'color' => '',
        'radius' => '',
        'style' => 'solid',
    );

    public static function parse($data = array()) {
        $data = array_merge(static::$default, $data);

        $properties = [];
        foreach (static::$default as $propertyKey => $defaultValue) {
            if (isset($data[$propertyKey]) && $data[$propertyKey]) {
                $properties['border-' . $propertyKey] = $data[$propertyKey];
            }
        }

        return $properties;

    }
}