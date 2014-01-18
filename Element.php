<?php
/*
 * This software implements a simplified DOM interface for PHP.
 * Copyright (C) 2004 Baron Schwartz <baron at xaprb dot com>
 */

include_once("Node.php");

class Element extends Node {

    var $tagName = null;

    function Element() {
        $this->Node();
        $this->nodeType = DOM_ELEMENT_NODE;
        $this->attributes = array();
    }

    function getAttribute($name) {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    function setAttribute($name, $value) {
        if ($this->containsInvalidCharacter($name)) {
            trigger_error("DOM_INVALID_CHARACTER_ERR", E_USER_ERROR);
        }
        if ($this->isReadOnly()) {
            trigger_error("DOM_NO_MODIFICATION_ALLOWED_ERR", E_USER_ERROR);
        }
        $this->attributes[$name] = "$value";
    }

    function removeAttribute($name) {
        if ($this->isReadOnly()) {
            trigger_error("DOM_NO_MODIFICATION_ALLOWED_ERR", E_USER_ERROR);
        }
        unset($this->attributes[$name]);
    }

    function getElementsByTagName($name) {
        $result = array();
        if ($name === "*") {
            $result[] =& $this;
        }
        elseif (isset($this->tagName) && $this->tagName === $name) {
            $result[] =& $this;
        }
        foreach (array_keys($this->childNodes) as $key) {
            if ($this->childNodes[$key]->nodeType == DOM_ELEMENT_NODE) {
                $result = array_merge($result,
                    $this->childNodes[$key]->getElementsByTagName($name));
            }
        }
        return $result;
    }

}

?>
