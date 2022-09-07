<?php


namespace Styx\Style;

/*
 * A rule si designed to add all the styling for a styled component of a component
 */

use Styx\LodashSimple;

class Rule
{
    private $style = [];
    public $state = null;
    public $media = null;
    public $styledComponentId = null;

    public function __construct($style,$options) {
        $options = LodashSimple::merge([
            'media' => Constants::MEDIA_DESKTOP,
            'state' => Constants::MEDIA_DESKTOP,
            'styledComponentId' => null
        ], $options);
        $this->style = $style;
        $this->styledComponentId = $options['styledComponentId'];
        $this->media = $options['media'];
        $this->state = $options['state'];
    }

    public function addStyle($style) {
        $this->style = array_merge($this->style, $style);
    }

    public function getStyle() {
        return $this->style;
    }

    public function getMedia() {
        return $this->media;
    }

    public function getState() {
        return $this->state;
    }
    public function getStyledComponentId() {
        return $this->styledComponentId;
    }

    public function ruleMatchesQuery($styledComponentId, $media, $state) {
        return  $styledComponentId === $this->styledComponentId &&
                $media === $this->media &&
                $state === $this->state;
    }
}