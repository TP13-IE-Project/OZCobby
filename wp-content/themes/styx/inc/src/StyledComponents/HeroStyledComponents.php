<?php

namespace Styx\StyledComponents;


class HeroStyledComponents extends StyledComponentsBase
{
    const  CONTAINER = 'container';
    const OVERLAY = 'overlay';

    public function elements() {
        return [
            [
                'id' => self::CONTAINER,
                'selector' => '.styx-hero__inner'
            ],
            [
                'id' => self::OVERLAY,
                'selector' => '.styx-overlay-layer'
            ]
        ];
    }

}