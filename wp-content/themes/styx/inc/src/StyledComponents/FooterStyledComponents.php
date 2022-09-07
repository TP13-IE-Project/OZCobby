<?php

namespace Styx\StyledComponents;


class FooterStyledComponents extends StyledComponentsBase
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