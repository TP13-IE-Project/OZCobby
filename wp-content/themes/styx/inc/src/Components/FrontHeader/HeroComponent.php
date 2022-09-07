<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentContainerBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\HeroStyledComponents;
use Styx\StyledComponents\PrimaryButtonStyledComponents;

class HeroComponent extends ComponentContainerBase
{

    public static $prefix = 'front-header.hero.';
    protected static $rootClass = 'styx-hero';
    protected static $template = 'header/hero';


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return [];
    }

    public function getStyleSettings() {
        $section = $this->getSectionId();
        return [
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Background Options', 'styx'),
                'section' => $section,
                'priority' => 1
            ],
            [
                'settings' => $this->settingPath('background.image'),
                'path' => 'background.image',
                'styledComponent' => HeroStyledComponents::CONTAINER,
                'type' => 'image',
                'label' => __('Backgrund image', 'styx'),
                'section' => $section,
                'priority' => 2,
                'default' => Defaults::get( $this->settingPath('background.image')),
            ],
            [
                'settings' => $this->settingPath('background.parallax'),
                'path' => 'background.parallax',
                'styledComponent' => HeroStyledComponents::CONTAINER,
                'type' => 'checkbox',
                'label' => __('Use parallax', 'styx'),
                'section' => $section,
                'priority' => 8,
                'default' => Defaults::get($this->settingPath('background.parallax')),
            ],
            [
                'settings' => $this->settingPath('fullHeight'),
                'path' => 'fullHeight',
                'styledComponent' => HeroStyledComponents::CONTAINER,
                'type' => 'checkbox',
                'label' => __('Full Height', 'styx'),
                'section' => $section,
                'priority' => 9,
                'default' => Defaults::get($this->settingPath('fullHeight')),
            ],

            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Overlay Options', 'styx'),
                'section' => $section,
                'priority' => 10
            ],
            [
                'settings' => $this->settingPath('background.overlay.enabled'),
                'type' => 'checkbox',
                'label' => __('Use overlay', 'styx'),
                'section' => $section,
                'priority' => 11,
                'default' => Defaults::get($this->settingPath('background.overlay.enabled')),
            ],
            [
                'settings' => $this->settingPath('background.overlay.color'),
                'path' => 'background.color',
                'styledComponent' => HeroStyledComponents::OVERLAY,
                'type' => 'color',
                'label' => __('Overlay color', 'styx'),
                'section' => $section,
                'priority' => 12,
                'default' => Defaults::get($this->settingPath('background.overlay.color')),
            ],
            [
                'settings' => $this->settingPath('background.overlay.opacity'),
                'path' => 'opacity',
                'styledComponent' => HeroStyledComponents::OVERLAY,
                'type' => 'slider',
                'label' => __('Overlay transparency', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('background.overlay.opacity')),
                'choices' => array(
                    'min' => 0.1,
                    'step' => 0.1,
                    'max' => 1,
                ),
                'priority' => 13,
            ],
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Content Options', 'styx'),
                'section' => $section,
                'priority' => 15
            ],
            [
                'settings' => $this->settingPath('padding'),
                'path' => 'padding',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'dimensions',
                'label' => __('Spacing', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('padding')),
                'priority' => 16
            ],
            [
                'settings' => $this->settingPath('textAlign'),
                'path' => 'textAlign',
                'styledComponent' => HeroStyledComponents::CONTAINER,
                'type' => 'radio-buttonset',
                'label' => __('Text Align', 'styx'),
                'section' => $section,
                'choices' => array(
                    'left' => __('Left', 'styx'),
                    'center' => __('Center', 'styx'),
                    'right' => __('Right', 'styx'),
                ),
                'default' => Defaults::get($this->settingPath('textAlign')),
                'priority' => 17,
            ],

        ];
    }
    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Hero settings', 'styx'),
                'panel' => 'hero',
                'priority' => 1,
            ]
        ];
    }

    public function getStyledComponents() {
        return new HeroStyledComponents();
    }

}