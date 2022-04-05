<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
    <?php
        include 'views/cabecera.php';
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>
<?php
        include 'views/menu.php';
    ?>
    <div class="container">
            <div class="row">
                <h3>Nuevo producto</h3>
            </div>
            <div class="row">
                <div class=" col-md-7">
                   <?php
                        if(isset($errores)){
                            if(count($errores)>0){
                                echo "<div class='alert alert-danger'><ul>";
                                foreach ($errores as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo "</ul></div>";

                            }
                        }

                   ?>
                    <form role="form" action="<?= PATH ?>/Productos/add" method="POST">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6">
                            <label for="codigo_producto">Codigo del producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" placeholder="Ingresa el codigo del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre_producto">Nombre del producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_producto" id="nombre_producto"  placeholder="Ingresa el nombre del producto"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="codigo_categoria">Categoria:</label>
                            <div class="input-group">
                                <select id="codigo_categoria" name="codigo_categoria" class="form-control">
                                <?php
                                    foreach($categorias as $categoria){
                                ?>
                                    <option value="<?=$categoria['codigo_categoria']?>"><?=$categoria['nombre_categoria']?></option>
                                    <?php } ?>                                     
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="existencias">Existencias:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="existencias" name="existencias"  placeholder="Ingresa las existencias del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio">Precio:</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio"  placeholder="Ingresa el precio del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Talla">Talla:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="talla" name="talla"  placeholder="Ingresa el precio del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="imagen">Imagen:</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="imagen" name="imagen"  placeholder="Ingresa el precio del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descripcion">Descripcion:</label>
                            <div class="input-group col-md-12">
                                <textarea class="form-control" name="descripcion"></textarea>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="<?= PATH ?>/Productos/index">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>
        