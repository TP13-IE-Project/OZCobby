<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\PrimaryButtonStyledComponents;

class PrimaryButtonComponent extends ComponentBase
{

    public static $prefix = 'front-header.primary-button.';
    protected static $rootClass = 'styx-button__primary';
    private static $settingPriority = 20;
    protected static $template = 'header/button';

    public function getStyledComponents() {
        return new PrimaryButtonStyledComponents();
    }


    public function getStyleSettings() {
        $section = $this->getSectionId();
        return array(
            [
                'settings' => $this->settingPath('typography'),
                'path' => 'typography',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'typography',
                'label' => __('Typography', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('typography')),
                'priority' => 19
            ],
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Button Colors', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'priority' => 20
            ],
            [
                'settings' => $this->settingPath('background.color'),
                'path' => 'background.color',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Button color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('background.color')),
                'priority' => 21
            ],
            [
                'settings' => $this->settingPath('states.hover.background.color'),
                'path' => 'background.color',
                'state' => 'hover',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Button hover color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('states.hover.background.color')),
                'priority' => 22
            ],

            [
                'settings' => $this->settingPath('color'),
                'path' => 'color',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Text color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('color')),
                'priority' => 23
            ],
            [
                'settings' => $this->settingPath('states.hover.color'),
                'path' => 'color',
                'state' => 'hover',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Text hover color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('states.hover.color')),
                'priority' => 24
            ],
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Button Spacing', 'styx'),
                'section' => $section,
                'priority' => 25
            ],
            [
                'settings' => $this->settingPath('padding'),
                'path' => 'padding',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'dimensions',
                'label' => __('Padding', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('padding')),
                'priority' => 26
            ],
            [
                'settings' => $this->settingPath('margin'),
                'path' => 'margin',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'dimensions',
                'label' => __('Margin', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('margin')),
                'priority' => 26
            ],

            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Button Border', 'styx'),
                'section' => $section,
                'priority' => 27
            ],
            [
                'settings' => $this->settingPath('border.width'),
                'path' => 'border.width',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'slider',
                'label' => __('Border Width', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'choices'     => [
                    'min'  => 0,
                    'max'  => 10,
                    'step' => 1,
                ],
                'default' => Defaults::get($this->settingPath('border.width')),
                'pattern' => '%spx',
                'priority' => 28
            ],
            [
                'settings' => $this->settingPath('border.radius'),
                'path' => 'border.radius',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'slider',
                'label' => __('Border radius', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'choices'     => [
                    'min'  => 0,
                    'max'  => 50,
                    'step' => 1,
                ],
                'default' => Defaults::get($this->settingPath('border.radius')),
                'pattern' => '%spx',
                'priority' => 28
            ],
            [
                'settings' => $this->settingPath('border.color'),
                'path' => 'border.color',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Border color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('border.color')),
                'priority' => 29
            ],
            [
                'settings' => $this->settingPath('states.hover.border.color'),
                'path' => 'border.color',
                'state' => 'hover',
                'styledComponent' => PrimaryButtonStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Border Hover Color', 'styx'),
                'section' => $section,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('states.hover.border.color')),
                'priority' => 29
            ],
        );
    }


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return array(
            [
                'settings' => $this->settingPath('separator' . $this->separatorIndex++),
                'type' => 'title',
                'label' => __('Button Content', 'styx'),
                'section' => $section,
                'priority' => 1
            ],
            [
                'settings' => $this->settingPath('enabled'),
                'type' => 'checkbox',
                'label' => __('Enabled', 'styx'),
                'section' => $section,
                'priority' => 2,
                'default' => Defaults::get($this->settingPath('enabled')),

            ],
            [
                'settings' => $this->settingPath('content'),
                'type' => 'text',
                'label' => __('Content', 'styx'),
                'section' => $section,
                'priority' => 3,
                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('content')),
            ],
            [
                'settings' => $this->settingPath('link'),
                'type' => 'text',
                'label' => __('Link', 'styx'),
                'section' => $section,
                'default' => '',
                'active_callback' => $this->getActiveCallback(),
                'priority' => 4,
            ],

        );
    }

    public function getActiveCallback() {
        return [
            [
                'setting' => $this->settingPath('enabled'),
                'operator' => '==',
                'value' => true
            ]
        ];
    }

    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Primary button', 'styx'),
                'panel' => 'hero',
                'priority' => 4,
            ]
        ];
    }


    public function isEnabled() {
        return $this->getData('enabled');
    }


    public function getLink() {
        $link = $this->getData('link');
        $link = $link ? $link : "#";
        return $link;
    }


    public function renderTemplate() {
        if (!$this->isEnabled()) {
            return;
        }

        get_template_part('template-parts/' . static::$template);
    }

}

