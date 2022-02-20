<?php

    $indexXML = 0;
    $indexProducto = $_POST['index'];

    $productos = simplexml_load_file('productos.xml');
    echo "<script>alert($indexProducto)</script>";
    
    foreach ($productos->producto as $producto) {

        if ($indexProducto == $indexXML) {
            $producto->codigo = $_POST['codigo'];
            $producto->nombre = $_POST['nombre'];
            $producto->descripcion = $_POST['descripcion'];
            $producto->img = $_POST['img'];
            $producto->categoria = $_POST['categoria'];
            $producto->precio = $_POST['precio'];
            $producto->existencias = $_POST['existencia'];
            break;
        }

        $indexXML++;
    }

    file_put_contents('productos.xml', $productos->asXML());
    
    header('location:privado.php');


?>