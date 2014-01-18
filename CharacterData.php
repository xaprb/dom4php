<?php
/*
 * This software implements a simplified DOM interface for PHP.
 * Copyright (C) 2004 Baron Schwartz <baron at xaprb dot com>
 */

include_once("Node.php");

class CharacterData extends Node {

    var $data;
    var $length;
    
    function CharacterData() {
        $this->Node();
        $this->nodeType = DOM_CDATA_SECTION_NODE;
    }

    function setData($data) {
        $this->data = $data;
        $this->length = strlen($data);
    }

    function substringData($offset, $count) {
    }

    function appendData($arg) {
    }

    function insertData($offset, $arg) {
    }

    function deleteData($offset, $count) {
    }

    function replaceData($offset, $count, $arg) {
    }

}

?>
