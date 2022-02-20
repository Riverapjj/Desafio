<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="page-nav">
        <h1>Tienda Enlinea</h1>
        <button class="button-checkout">Pagar</button>
    </div>
    <div class="page-content">
            <?php
            
                $productos = simplexml_load_file('../productos.xml');

                foreach ($productos->producto as $producto) {

                
            ?>

                <div class="page-container">
                    <h3><?=$producto->nombre?></h3>
                    <img src="img/<?=$producto->img?>">
                    <h2>$<?=$producto->precio?></h2>
                    <details><?=$producto->descripcion?></details>
                    <button class="button-add">Agregar</button>
                </div>
                
            <?php
                }
            ?>
    </div>
</body>
</html>