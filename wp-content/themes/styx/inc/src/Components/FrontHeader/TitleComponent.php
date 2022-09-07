<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\TitleStyledComponents;

class TitleComponent extends ComponentBase
{

    public static $prefix = 'front-header.title.';
    protected static $rootClass = 'styx-title';
    protected static $template = 'header/title';

    public function getStyledComponents() {
        return new TitleStyledComponents();
    }

    public function getStyleSettings() {
        $section = $this->getSectionId();
        return array(

            [
                'settings' => $this->settingPath('color'),
                'path' => 'color',
                'styledComponent' => TitleStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Text color', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('color')),
                'priority' => 20
            ],
            [
                'settings' => $this->settingPath('typography'),
                'path' => 'typography',
                'styledComponent' => TitleStyledComponents::CONTAINER,
                'type' => 'typography',
                'label' => __('Typography', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('typography')),
                'priority' => 21
            ],

        );
    }


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return array(
            [
                'settings' => $this->settingPath('enabled'),
                'type' => 'checkbox',
                'label' => __('Enabled', 'styx'),
                'section' => $section,
                'priority' => 9,
                'default' => Defaults::get($this->settingPath('enabled')),

            ],
            [
                'settings' => $this->settingPath('content'),
                'type' => 'textarea',
                'label' => __('Content', 'styx'),
                'section' => $section,
                'priority' => 10,
                'default' => Defaults::get($this->settingPath('content')),
            ],
        );
    }

    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Title', 'styx'),
                'panel' => 'hero',
                'priority' => 1,
            ]
        ];
    }

    public function isActive() {
        $data =  $this->getData('enabled');
        return $data;
    }
    public function renderTemplate() {
        if(!$this->isActive()) {
            return;
        }
        get_template_part('template-parts/' . static::$template);
    }
}

