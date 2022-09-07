<?php


namespace Styx\Style;

/*
 * Group styles based on the styled components, uses rules to group style on the same selector(same styled component)
 */

use Styx\LodashSimple;

class RulesManager
{
    private $rules = [];
    private $rootSelector = '';
    private $styledComponents = [];
    private $baseStyle = [

            ];
    public function __construct($rootSelector, $styledComponents) {
        $this->rootSelector = $rootSelector;
        $this->styledComponents = $styledComponents;
    }

    public function getRules() {
        return $this->rules;
    }

    public function addRule($style, $styledComponent, $options = []) {
        if(empty($style)){
            return;
        }

        $options = LodashSimple::merge([
            'media' => Constants::MEDIA_DESKTOP,
            'state' => Constants::STATE_NORMAL,
            'styledComponentId' => $styledComponent['id']
        ], $options);


        $rule = $this->getRuleByStyledComponent($options);
        if (!$rule) {
            $rule = new Rule($style, $options);
            $this->rules[] = $rule;
        } else {
            $rule->addStyle($style);
        }
    }

    public function getRuleByStyledComponent($options) {
        $result = null;
        foreach($this->rules as $rule) {
            if($rule->ruleMatchesQuery($options['styledComponentId'], $options['media'], $options['state'])) {
                $result = $rule;
            }
        }

        return $result ? $result : null;
    }

    public function generateCSS() {
        $css = '';
        $rules = $this->getOrderedRules();
        foreach ($rules as $rule) {
            $css .= $this->generateRuleStyle($rule);
        }

        return $css;
    }

    public function getOrderedRules() {
        $rules = $this->rules;
        $normalRules = [];
        $stateRules = [];
        $mediaRules = [];
        $mediaStateRules = [];
        foreach($rules as $rule) {
            $state = $rule->getState();
            $media = $rule->getMedia();
            if($state !== Constants::STATE_NORMAL && $media !== Constants::MEDIA_DESKTOP) {
                $mediaStateRules[] = $rule;
                continue;
            }
            if($state !== Constants::STATE_NORMAL) {
                $stateRules[] = $rule;
                continue;
            }
            if($media !== Constants::MEDIA_DESKTOP) {
                $mediaRules[] = $rule;
                continue;
            }

            $normalRules[] = $rule;
        }

        return array_merge( $normalRules, $stateRules, $mediaRules, $mediaStateRules);
    }

    public function getStyledComponentSelector($rule) {
        $styledComponentId = $rule->getStyledComponentId();
        $styledComponentElement = $this->styledComponents->getElementById($styledComponentId);
        $styledComponentSelector = $styledComponentElement['selector'];
        $mergedSelector = sprintf('%s %s',$this->rootSelector, $styledComponentSelector);
        $statesById = Constants::getStatesById();
        $state = $rule->getState() ;
        if($state !== Constants::STATE_NORMAL) {
            $mergedSelector = trim($mergedSelector);
            $mergedSelector = sprintf('%s%s', $mergedSelector, $statesById[$state]['selector']);
        }
        $media = $rule->getMedia();
        $mediaById = Constants::getMediaById();
        if($media !== Constants::MEDIA_DESKTOP) {
            $mergedSelector = sprintf('%s { %s ', $mediaById[$media]['query'], $mergedSelector);
        }

        return $mergedSelector;
    }

    public function generateRuleStyle($rule) {
        $selector = $this->getStyledComponentSelector($rule);
        ob_start();
        ?>
        <style type="text/css">
            <?php
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo $selector;
            ?>
            {
            <?php
                foreach($rule->getStyle() as $property => $value) {
                   echo esc_html(sprintf('%s: %s;', $property, $value));
                }

                //media query closing tag
                if($rule->getMedia() !== 'desktop') {
                    echo '}';
                }
            ?>
            }
        </style>
        <?php
        return  trim(strip_tags (ob_get_clean()));
    }

}