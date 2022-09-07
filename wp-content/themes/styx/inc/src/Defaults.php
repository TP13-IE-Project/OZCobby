<?php

namespace Styx;

class Defaults
{
    private static $instance;
    private $data = array();

    private function __construct() {
        $this->data = require_once get_template_directory() . "/inc/defaults-data.php";
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

    public static function getData() {
        return self::getInstance()->data;
    }

    public static function get($path, $default = '') {
       return  LodashSimple::get(static::getData(), $path, $default);
    }
}