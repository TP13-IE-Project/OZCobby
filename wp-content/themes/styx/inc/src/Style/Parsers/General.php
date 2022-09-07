<?php

namespace Styx\Style\Parsers;

class General extends BaseParser
{

    public static $default = array(
        'color' => '',
        'fullHeight' => '',
        'opacity' => '',
        'textAlign' => ''
    );

    public static function parse($data = array()) {
        $data = array_merge(static::$default, $data);

        $properties = [];
        if ($data['color']) {
            $properties['color'] = $data['color'];
        }

        if ($data['fullHeight']) {
            $properties['min-height'] = '100vh';
        }
        if ($data['opacity'] || $data['opacity'] === '0' || $data['opacity'] === 0) {
            $properties['opacity'] = $data['opacity'];
        }
        if ($data['textAlign']) {
            $properties['text-align'] = $data['textAlign'];
        }

        return $properties;

    }
}