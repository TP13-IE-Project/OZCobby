<?php

namespace Styx;

class StyxTheme
{

    private static $instance = null;

    private function __construct() {

        add_action('after_setup_theme', array($this, 'boot'));
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function init() {
        return self::getInstance();
    }

    public function boot() {
        Defaults::init();
        Customizer::init();
        ComponentsRepository::init();
    }
}