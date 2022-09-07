<?php


namespace Styx\Style\Parsers;


abstract class BaseParser
{
    public static $default = null;

    public static abstract function parse($data);
}