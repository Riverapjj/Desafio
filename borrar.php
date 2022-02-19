<?php

    $codigo = $_GET['cod'];

    $productos = simplexml_load_file('productos.xml');
    $i = 0;

    foreach ($productos->producto as $producto) {

        if ($producto->codigo  == $codigo) {
            break;
        }
        $i++;
    }

    unset($productos->producto[$i]);
    file_put_contents('productos.xml', $productos->asXML());

    header('location:privado.php');

?>