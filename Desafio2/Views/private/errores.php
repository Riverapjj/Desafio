<?php

    require('validaciones.php');
    $errores = array();

    if (isset($_POST)) {

        extract($_POST);

        if (!isset($codigo) || isCod($codigo)) {
            array_push($errores, "El formato del código es incorrecto (PROD####)");
        }

        if (!isset($nombre) || isEmpty($nombre)) {
            array_push($errores, "Debes ingresar el nombre");
        }else if (!isText($nombre)) {
            array_push($errores, "El nombre solo debe contener letras");
        }
    }



?>