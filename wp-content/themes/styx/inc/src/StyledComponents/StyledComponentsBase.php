<?php

namespace Styx\StyledComponents;

abstract class StyledComponentsBase
{
    abstract public function elements();

    public function getElementById($id) {
        $result = null;
        $elements = $this->elements();
        foreach($elements as $styledElement) {
            if($styledElement['id'] === $id) {
                $result = $styledElement;
            }
        }
        return $result;
    }
}