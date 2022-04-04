<?php

    function isCod($var) {
        return preg_match('/^PROD[0-9]{5}$/', $var);
    }

    function isEmpty($var) {
        return empty(trim($var));
    }

    function isText($var) {
        return preg_match('/^[a-zA-Z ]+$/', $var);
    }


?>