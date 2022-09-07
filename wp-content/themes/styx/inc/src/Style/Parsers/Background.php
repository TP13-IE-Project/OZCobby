<?php

namespace Styx\Style\Parsers;

use Styx\LodashSimple;

class Background extends BaseParser
{

    public static $default = array(
        'color' => '',
        'image' => '',
        'position' => 'center center',
        'attachment' => 'scroll',
        'repeat' => 'no-repeat',
        'size' => 'cover',
        'parallax' => '',
    );

    public static function parse($data = array()) {
        $data = LodashSimple::merge(array(), static::$default, $data);

        $properties = [];
        if ($data['color']) {
            $properties['background-color'] = $data['color'];
        }
        if ($data['image']) {
            $url = \wp_get_attachment_url($data['image']);
            $url = $url ? $url : $data['image'];
            $properties['background-image'] = sprintf('url(%s)', $url);
            $properties['background-position'] = $data['position'];
            $properties['background-repeat'] = $data['repeat'];
            $properties['background-size'] = $data['size'];
            $properties['background-attachment'] = $data['attachment'];
        }

        if ($data['parallax']) {
            $properties['background-position'] = 'center center';
            $properties['background-attachment'] = 'fixed';
            $properties['background-size'] = 'cover';
        }


        return $properties;

    }
}