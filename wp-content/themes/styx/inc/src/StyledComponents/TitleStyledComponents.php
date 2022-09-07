<?php

namespace Styx\StyledComponents;


class TitleStyledComponents extends StyledComponentsBase
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