<?php

namespace Styx\Style;

class Constants
{
    const MEDIA_DESKTOP = 'desktop';
    const MEDIA_TABLET = 'tablet';
    const MEDIA_MOBILE = 'mobile';
    CONST STATE_NORMAL = 'normal';
    CONST STATE_HOVER = 'hover';

    public static function getMedia() {
        return [static::MEDIA_DESKTOP, static::MEDIA_TABLET, static::MEDIA_MOBILE];
    }

    public static function getStates() {
        return [static::STATE_NORMAL, static::STATE_HOVER];
    }

    public static function getMediaById() {
        return [
            static::MEDIA_DESKTOP => [
                'id' => static::MEDIA_DESKTOP,
                'query' => '',
            ],
            static::MEDIA_TABLET => [
                'id' => static::MEDIA_TABLET,
                'query' => '@media (min-width: 768px) and (max-width: 1023px)',
            ],
            static::MEDIA_MOBILE => [
                'id' => static::MEDIA_MOBILE,
                'query' => '@media (max-width: 767px)',
            ],
        ];
    }

    public static function getStatesById() {
        return [
            static::STATE_NORMAL => [
                'id' => static::STATE_NORMAL,
                'selector' => '',

            ],
            static::STATE_HOVER => [
                'id' => static::STATE_HOVER,
                'selector' => ':hover'
            ]
        ];
    }
}