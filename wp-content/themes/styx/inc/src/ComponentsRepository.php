<?php

namespace Styx;

use Styx\Components\Footer\FooterComponent;
use Styx\Components\FrontHeader\HeroComponent;
use Styx\Components\FrontHeader\LogoComponent;
use Styx\Components\FrontHeader\MenuComponent;
use Styx\Components\FrontHeader\NavigationComponent;
use Styx\Components\FrontHeader\PrimaryButtonComponent;
use Styx\Components\FrontHeader\SecondaryButtonComponent;
use Styx\Components\FrontHeader\SubtitleComponent;
use Styx\Components\FrontHeader\TitleComponent;
use Kirki;

class ComponentsRepository
{

    private static $instance = null;
    private $components = [];
    private static $activeComponent = null;

    private function __construct() {
        self::$instance = $this;
        $this->boot();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function boot() {
        add_action('init', array($this, 'initKirkiSettings'));
        add_action( 'customize_register', array($this, 'initCustomSettings') );

        $controlsClasses = $this->getComponentsClasses();
        foreach ($controlsClasses as $componentName => $componentClass) {
            $this->components[$componentName] = new $componentClass();
        }

        return $this;
    }

    private function getComponentsClasses() {
        return [
            'footer' => FooterComponent::class,
            'hero' => HeroComponent::class,
            'navigation' => NavigationComponent::class,
            'logo' => LogoComponent::class,
            'menu' => MenuComponent::class,
            'primary-button' => PrimaryButtonComponent::class,
            'secondary-button' => SecondaryButtonComponent::class,
            'front-title' => TitleComponent::class,
            'front-subtitle' => SubtitleComponent::class
        ];
    }

    public function initCustomSettings($wp_customize) {
        $logoComponent = $this->components['logo'];
        $wp_customize->selective_refresh->add_partial( 'custom_logo', array(
            'selector'            => $logoComponent->getPartialRefreshSelector(),
            'render_callback'     => array($logoComponent, 'getPartialRefreshContent'),
            'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
        ) );
    }

    public static function setActiveComponent($component) {
        static::$activeComponent = $component;
    }

    public static function getActiveComponent() {
        return static::$activeComponent;
    }

    public static function render($name) {
        self::getInstance()->components[$name]->render();
    }

    public static function init() {
        self::getInstance();
    }


    private function registerSettings($component) {
        $settings = $component->getSettings();

        foreach ($settings as $setting) {
            $combinedSettings = LodashSimple::merge([], $setting, [
                'partial_refresh' => [
                    $setting['settings'] => [
                        'selector' => $component->getPartialRefreshSelector(),
                        'render_callback' => array($component, 'getPartialRefreshContent')
                    ]
                ]
            ]);
            Kirki::add_field($setting['settings'], $combinedSettings);
        }
    }


    public function registerSections($sections) {

        foreach ($sections as $section) {
            Kirki::add_section($section['id'], $section);
        }
    }

    public function getPanels() {
        return [
            [
                'id' => 'navigation',
                'title' => __('Navigation', 'styx'),
                'description' => __('Navigation section', 'styx'),
                'priority' => 1
            ],
            [
                'id' => 'hero',
                'title' => __('Hero', 'styx'),
                'description' => __('Hero section', 'styx'),
                'priority' => 2
            ],
            [
                'id' => 'footer',
                'title' => __('Footer', 'styx'),
                'description' => __('Footer section', 'styx'),
                'priority' => 3
            ],
        ];
    }

    public function registerPanels() {
        $panels = $this->getPanels();
        foreach ($panels as $panel) {
            Kirki::add_panel($panel['id'], $panel);
        }

    }

    public function initKirkiSettings() {

        $this->registerPanels();
        foreach ($this->components as $component) {

            $this->registerSections($component->getSections());
            $this->registerSettings($component);


        }

//        Kirki::add_panel('kirki_panel', array(
//            'priority' => 10,
//            'title' => esc_html__('Kirki panel', 'kirki'),
//            'description' => esc_html__('My panel description', 'kirki'),
//        ));
//        Kirki::add_section('kirki_section', array(
//            'title' => esc_html__('Kirki section', 'kirki'),
//            'description' => esc_html__('My section description.', 'kirki'),
//            'panel' => 'kirki_panel',
//            'priority' => 160,
//        ));
//
//        Kirki::add_field( 'kirki_checkbox', [
//            'type'        => 'checkbox',
//            'settings'    => 'kirki_checkbox',
//            'label'       => esc_html__( 'Checkbox Control', 'kirki' ),
//            'description' => esc_html__( 'Description', 'kirki' ),
//            'section'     => 'kirki_section',
//            'default'     => true,
//        ] );
    }

    public function initFrontendSettings($wp_customize) {
        foreach ($this->components as $component) {
            $this->registerSettings($wp_customize, $component);
        }
    }
}