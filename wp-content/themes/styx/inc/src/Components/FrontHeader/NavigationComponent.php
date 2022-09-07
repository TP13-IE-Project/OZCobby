<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\NavigationStyledComponents;
use Styx\StyledComponents\TitleStyledComponents;

class NavigationComponent extends ComponentBase
{

    public static $prefix = 'front-header.navigation.';
    protected static $rootClass = 'styx-navigation';
    protected static $template = 'header/navigation';

    public function getStyledComponents() {
        return new NavigationStyledComponents();
    }

    public function getStyleSettings() {
        $section = $this->getSectionId();
        return [
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Navigation Style', 'styx'),
                'section' => $section,
                'priority' => 10
            ],
            [
                'settings' => $this->settingPath('background.color'),
                'path' => 'background.color',
                'styledComponent' => NavigationStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Background color', 'styx'),
                'section' => $section,
             //   'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('background.color')),
                'priority' => 23
            ],
            [
                'settings' => $this->settingPath('padding'),
                'path' => 'padding',
                'styledComponent' => NavigationStyledComponents::CONTAINER,
                'type' => 'dimensions',
                'label' => __('Spacing', 'styx'),
                'section' => $section,
//                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('padding')),
                'priority' => 26
            ],
        ];
    }


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return [];
    }

    public function rightPencil() {
        return true;
    }

    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Navigation content', 'styx'),
                'panel' => 'navigation',
                'priority' => 1,
            ]
        ];
    }
}

