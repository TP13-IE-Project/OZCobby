<?php

namespace Styx\Style;

use Styx\LodashSimple;
use Styx\Style\Parsers\Background;
use Styx\Style\Parsers\Border;
use Styx\Style\Parsers\General;
use Styx\Style\Parsers\Margin;
use Styx\Style\Parsers\Padding;
use Styx\Style\Parsers\Typography;
use Styx\StyledComponents\StyledComponentsBase;

class StyleParser
{

    private static $instance = null;
    private $parsers = [];

    private function __construct() {
        $this->loadParsers();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getParsers() {
        return [
            'background' => Background::class,
            'general' => General::class,
            'typography' => Typography::class,
            'padding' => Padding::class,
            'margin' => Margin::class,
            'border' => Border::class
        ];
    }

    public function getData($path, $default = '') {
        return get_theme_mod($path, $default);
    }

    public function parseSettingsToCss($data) {
        $data = array_merge(array(
            'settings' => [],
            'styledComponents' => null,
            'rootSelector' => ''
        ), $data);
        $settings = $data['settings'];
        $styledComponents = $data['styledComponents'];
        $rootSelector = $data['rootSelector'];
        $parsers = $this->getParsers();
        $rulesManager = new RulesManager($rootSelector, $styledComponents);
        $styleGroupedByStyledComponent = array();
        foreach ($settings as $setting) {
            $styledComponentId = LodashSimple::get($setting, 'styledComponent');
            if (!$styledComponentId) {
                continue;
            }
            $propertyData = $this->getPropertyFromSetting($setting);
            $media = LodashSimple::get($setting, 'media', Constants::MEDIA_DESKTOP);
            $state = LodashSimple::get($setting, 'state', Constants::STATE_NORMAL);

            $basePath = [];
            if ($media && $media !== Constants::MEDIA_DESKTOP) {
                $basePath = array_merge($basePath, ['media', $media]);
            }
            if ($state && $state !== Constants::STATE_NORMAL) {
                $basePath = array_merge($basePath, ['states', $state]);
            }

            $basePathString = implode('.', $basePath);
            $parserName = $propertyData['parser'];
            $path = $propertyData['path'];
            $defaultValue = array_key_exists('default', $setting) ? $setting['default'] : null;
            $value = $this->getData($setting['settings'], $defaultValue);
            $data = [];
            if ($basePathString) {
                $rootPath = sprintf("%s.%s", $basePathString, $parserName);
            } else {
                $rootPath = $parserName;
            }
            if(is_string($value) && array_key_exists('pattern', $setting)) {
                $value = sprintf($setting['pattern'], $value);
            }
            if(!$path && is_array($value)) {
                $data = LodashSimple::merge($data, $value);
            } else {
                LodashSimple::set($data, $path, $value);
            }
            $styledComponentData = LodashSimple::get($styleGroupedByStyledComponent, $styledComponentId, array());
            $parserData = [];
            LodashSimple::set($parserData, $rootPath, $data);
            $styledComponentData = LodashSimple::merge($styledComponentData, $parserData);
            LodashSimple::set($styleGroupedByStyledComponent, $styledComponentId, $styledComponentData);
        }

        $this->generateRules($styleGroupedByStyledComponent, $styledComponents, $rulesManager);
        $css = $rulesManager->generateCSS();
        return $css;
    }


    public function generateRules($styleGroupedByStyledComponent, $styledComponents, $rulesManager) {
        foreach ($styleGroupedByStyledComponent as $styledComponentId => $styledComponentData) {
            $styledComponent = $styledComponents->getElementById($styledComponentId);
            $stateData = LodashSimple::get($styledComponentData, 'states', array());
            $mediaData = LodashSimple::get($styledComponentData, 'media', array());
            LodashSimple::unsetValue($styledComponentData, 'states');
            LodashSimple::unsetValue($styledComponentData, 'media');
            $this->addRules($styledComponentData, $styledComponent, $rulesManager);

            foreach ($stateData as $stateKey => $stateData) {
                $options = [
                    'state' => $stateKey
                ];
                $this->addRules($stateData, $styledComponent, $rulesManager, $options);
            }
            foreach ($mediaData as $mediaKey => $dataByMedia) {
                $options = [
                    'media' => $mediaKey
                ];

                $stateDataByMedia = LodashSimple::get($dataByMedia, 'states', array());
                LodashSimple::unsetValue($dataByMedia, 'states');

                $this->addRules($dataByMedia, $styledComponent, $rulesManager, $options);


                foreach ($stateDataByMedia as $stateKey => $stateData) {
                    $options = [
                        'media' => $mediaKey,
                        'state' => $stateKey
                    ];
                    $this->addRules($stateData, $styledComponent, $rulesManager, $options);
                }
            }

        }
    }
    public function addRules($data, $styledComponent, $rulesManager, $options = array()) {
        foreach ($data as $parserName => $propertyValue) {

            $style = call_user_func( $this->parsers[ $parserName ] . '::parse', $propertyValue );
            $rulesManager->addRule($style, $styledComponent, $options);
        }
    }

    public function getPropertyFromSetting($setting) {
        $path = $setting['path'];
        $pathParts = explode('.', $path);
        $property = $pathParts[0];
        array_shift($pathParts);
        $parsers = $this->getParsers();
        //general style, not an object
        if (count($pathParts) === 0) {
            if(array_key_exists($property, $parsers)) {
                return [
                    'parser' => $property,
                    'path' => ''
                ];
            }
            return [
                'parser' => 'general',
                'path' => $property
            ];
        } else {
            $localPath = implode('.', $pathParts);
            return [
                'parser' => $property,
                'path' => $localPath
            ];
        }

    }

    private function loadParsers() {
        $this->parsers = $this->getParsers();
    }


}