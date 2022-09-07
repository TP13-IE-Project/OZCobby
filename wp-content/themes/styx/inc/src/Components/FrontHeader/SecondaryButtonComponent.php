<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;

class SecondaryButtonComponent extends PrimaryButtonComponent
{

    public static $prefix = 'front-header.secondary-button.';
    protected static $rootClass = 'styx-button__secondary';
    private static $settingPriority = 20;


    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Secondary button', 'styx'),
                'panel' => 'hero',
                'priority' => 5,
            ]
        ];
    }

}

