<?php

    function estaVacio($var) {
        return empty(trim($var));
    }

    function esTexto($var) {
        return preg_match('/^[a-zA-Z \u00C0-\u017F\W]+$/', $var);
    }

    function esTalla($var) {
        return preg_match('/^[a-zA-Z]{1,4}$/', $var);
    }

    function esNumero($var) {
        return preg_match('/^[0-9 ]+$/', $var);
    }

    function esDecimal($var) {
        return preg_match('/^[0-9]{1,3}.[0-9]{1,2}$/', $var);
    }

    function esMail($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function esCarnet($var) {
        return preg_match('/^[A-Z]{2}[0-9]{6}$/', $var);
    }

    function esTelefono($var) {
        return preg_match('/^[762][0-9]{3}-?[0-9]{4}$/', $var);
    }

    function esCodigoCategoria($var) {
        return preg_match('/^CAT[0-9]{3}$/', $var);
    }

    function esCodigoProducto($var) {
        return preg_match('/^PROD[0-9]{5}$/', $var);
    }
?>