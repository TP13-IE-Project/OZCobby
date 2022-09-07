<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;

class SubtitleComponent extends TitleComponent
{

    public static $prefix = 'front-header.subtitle.';
    protected static $rootClass = 'styx-subtitle';
    protected static $template = 'header/subtitle';

    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Subtitle', 'styx'),
                'panel' => 'hero',
                'priority' => 2,
            ]
        ];
    }

}

