<?php

    $productos = simplexml_load_file('../productos.xml');

    $producto = $productos->addChild('producto');

    
            $producto->addChild('codigo', $_POST['codigo']);
            $producto->addChild('nombre', $_POST['nombre']);
            $producto->addChild('descripcion', $_POST['descripcion']);
            $producto->addChild('img', $_POST['img']);
            $producto->addChild('categoria', $_POST['categoria']);
            $producto->addChild('precio', $_POST['precio']);
            $producto->addChild('existencias', $_POST['existencia']);

    file_put_contents('../productos.xml', $productos->asXML());

    header('location:privado.php?exito=1');
?>

?>