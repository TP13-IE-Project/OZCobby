<?php

namespace Styx\StyledComponents;


class PrimaryButtonStyledComponents extends StyledComponentsBase
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