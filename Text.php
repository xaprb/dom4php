<?php
/*
 * This software implements a simplified DOM interface for PHP.
 * Copyright (C) 2004 Baron Schwartz <baron at xaprb dot com>
 */

include_once("CharacterData.php");

class Text extends CharacterData {
        
    // {{{Text
    function Text() {
        $this->CharacterData();
        $this->nodeType = DOM_TEXT_NODE;
    } //}}}

    // {{{splitText
    function splitText($offset) {
        // Check whether to throw Exceptions
        if ($offset < 0 || $offset > $this->length) {
            trigger_error("DOM_INDEX_SIZE_ERR", E_USER_ERROR);
        }
        if ($this->readOnly) {
            trigger_error("DOM_NO_MODIFICATION_ALLOWED_ERR", E_USER_ERROR);
        }
        // Split the text, create a new node, and insert it after this one
        $afterText = substr($this->data, $offset);
        $this->setData(substr($this->data, $offset));
        $newChild =& new Text($afterText);
        return $this->parentNode->insertBefore($newChild, $this->nextSibling);
    } //}}}

}

?>
