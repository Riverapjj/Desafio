<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Dashboard</title>
</head>
<body>
    <?php include('agregar.php');?>

    <div class="container">
        <h1 class="page-header text-center">Textiles</h1>
        <div class="row">
            <div class="col-sm-offset-2 border border-primary">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregar">Agregar</button>
                <div class="table-responsive">
                    <table class="table table-hover table-align-middle mt-4">
                        <thead class="table table-dark">
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Acciones</th>
                        </thead>

                        <?php
                            $productos = simplexml_load_file('productos.xml');

                            foreach ($productos as $producto) {


                        
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $producto->codigo;?></td>
                                    <td><?= $producto->nombre;?></td>
                                    <td>
                                        <div class="overflow-auto">
                                        <?= $producto->descripcion;?>
                                        </div>
                                    </td>
                                    <td><?= $producto->categoria;?></td>
                                    <td>$<?= $producto->precio;?></td>
                                    <td><?= $producto->existencias;?></td>
                                    <td class="d-flex p-2 ">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editar_<?= $producto->codigo;?>">Editar</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrar_<?= $producto->codigo;?>">Borrar</button>
                                    </td>
                                </tr>
                            </tbody>

                        <?php
                                include('editar.php');
                                include('borrar.php');
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>    
<script src="js/bootstrap.min.js"></script>
</body>
</html>