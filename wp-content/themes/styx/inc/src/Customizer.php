<?php

namespace Styx;


class Customizer
{

    private static $instance = null;

    private function __construct() {
        self::$instance = $this;

    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function init() {
        self::getInstance();
    }


}