<?php

namespace Styx\Components\Footer;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\FooterStyledComponents;


class FooterComponent extends ComponentBase
{

    public static $prefix = 'footer.';
    protected static $rootClass = 'styx-footer';
    protected static $template = 'footer/footer';

    public function getStyledComponents() {
        return new FooterStyledComponents();
    }

    public function getStyleSettings() {
        $section = $this->getSectionId();
        return [
            [
                'settings' => $this->settingPath('background.color'),
                'path' => 'background.color',
                'styledComponent' => FooterStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Background color', 'styx'),
                'section' => $section,
                //   'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('background.color')),
                'priority' => 2
            ],
            [
                'settings' => $this->settingPath('color'),
                'path' => 'color',
                'styledComponent' => FooterStyledComponents::CONTAINER,
                'type' => 'color',
                'label' => __('Text color', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('color')),
                'priority' => 3
            ],
            [
                'settings' => $this->settingPath('padding'),
                'path' => 'padding',
                'styledComponent' => FooterStyledComponents::CONTAINER,
                'type' => 'dimensions',
                'label' => __('Spacing', 'styx'),
                'section' => $section,
//                'active_callback' => $this->getActiveCallback(),
                'default' => Defaults::get($this->settingPath('padding')),
                'priority' => 4
            ],
            [
                'settings' => $this->settingPath('typography'),
                'path' => 'typography',
                'styledComponent' => FooterStyledComponents::CONTAINER,
                'type' => 'typography',
                'label' => __('Typography', 'styx'),
                'section' => $section,
                'default' => Defaults::get($this->settingPath('typography')),
                'priority' => 5
            ],
        ];
    }


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return [
            [
                'settings' => $this->settingPath('content'),
                'type' => 'textarea',
                'label' => __('Content', 'styx'),
                'section' => $section,
                'priority' => 1,
                'default' => Defaults::get($this->settingPath('content')),
            ],

        ];
    }

    public function rightPencil() {
        return true;
    }

    public function renderFooter() {
        echo  esc_html($this->getData('content'));
    }
//    public function getSectionId() {
//        return 'footer';
//    }
    public function getSections() {
        return [
            [
                'id' => $this->getSectionId(),
                'title' => __('Content', 'styx'),
                'panel' => 'footer',
                'priority' => 1,
            ]
        ];
    }
}

