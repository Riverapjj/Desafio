<?php

    function esCod($var) {
        return preg_match('/^PROD[0-9]{5}$/', $var);
    }
?>