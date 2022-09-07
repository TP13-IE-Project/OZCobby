<?php

namespace Styx\StyledComponents;


class LogoStyledComponents extends StyledComponentsBase
{
    const  CONTAINER = 'container';

    public function elements() {
        return [
            [
                'id' => self::CONTAINER,
                'selector' => ''
            ]
        ];
    }

}