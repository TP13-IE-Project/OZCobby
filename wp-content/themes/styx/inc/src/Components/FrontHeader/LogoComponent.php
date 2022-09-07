<?php

namespace Styx\Components\FrontHeader;

use Styx\Components\ComponentBase;
use Styx\ComponentsRepository;
use Styx\Defaults;
use Styx\StyledComponents\HeroStyledComponents;
use Styx\StyledComponents\LogoStyledComponents;

class LogoComponent extends ComponentBase
{

    public static $prefix = 'front-header.logo.';
    protected static $rootClass = 'styx-logo';
    protected static $template = 'header/logo';

    public function getStyledComponents() {
        return new LogoStyledComponents();
    }

    public function getStyleSettings() {
        $section = $this->getSectionId();
        return [];
    }


    public function getPropsSettings() {
        $section = $this->getSectionId();
        return [];
//        return array(
//            [
//                'settings' => $this->settingPath('type'),
//                'type' => 'select',
//                'label' => __('Type', 'styx'),
//                'section' => $section,
//                'priority' => 9,
//                'choices' => [
//                    'text' => __('Text', 'styx'),
//                    'image' => __('Image', 'styx')
//                ],
//                'default' => Defaults::get($this->settingPath('type')),
//            ],
//            [
//                'settings' => $this->settingPath('text'),
//                'type' => 'textarea',
//                'label' => __('Site title', 'styx'),
//                'section' => $section,
//                'priority' => 10,
//                'preset' => array(),
//
//                'active_callback' => [
//                    [
//                        'setting' => $this->settingPath('type'),
//                        'operator' => '==',
//                        'value' => 'text',
//                    ]
//                ]
//            ],
//
//            [
//                'settings' => 'custom_logo',
//                'type' => 'image',
//                'label' => __('Logo', 'styx'),
//                'section' => $section,
//                'priority' => 1,
//                'active_callback' => [
//                    [
//                        'setting' => $this->settingPath('type'),
//                        'operator' => '==',
//                        'value' => 'image',
//                    ]
//                ]
//            ],
//        );
    }

    public function getSections() {
        return [
//            [
//                'id' => $this->getSectionId(),
//                'title' => __('Logo', 'styx'),
//                'panel' => 'navigation',
//                'priority' => 1,
//            ]
        ];
    }

    public function logoIsImage() {
        return !$this->logoIsText();
    }

    public function renderTextLogo() {

        echo sprintf('<a class="styx-text-logo" data-type="group" data-dynamic-mod="true" href="%1$s">%2$s</a>',
            esc_attr($this->getHomeurl()), esc_html(get_bloginfo('name')));

    }

    public function renderLogo() {
        if ($this->logoIsImage()) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo get_custom_logo();
        }
        if ($this->logoIsText()) {
            $this->renderTextLogo();
        }

    }

    public function getHomeUrl() {
        return esc_url(home_url('/'));
    }

    public function logoIsText() {
        return !has_custom_logo();
    }

    public function getLogoTitle() {
        return get_bloginfo('name');
    }

}

