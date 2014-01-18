<?php
/*
 * This software implements a simplified DOM interface for PHP.
 * Copyright (C) 2004 Baron Schwartz <baron at xaprb dot com>
 */

include_once("Node.php");

class DocumentFragment extends Node {

    function DocumentFragment() {
        $this->Node();
        $this->nodeType = DOM_DOCUMENT_FRAGMENT_NODE;
    }

}

?>
