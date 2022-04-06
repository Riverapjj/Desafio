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
                <h3>Nuevo usuario</h3>
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
                    <form role="form" action="<?= PATH ?>/Usuarios/add" method="POST">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6">
                            <label for="nombre_producto">Nombre del usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"  placeholder="Ingresa el nombre del producto"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="codigo_categoria">Tipo de usuario:</label>
                            <div class="input-group">
                                <select id="codigo_tipo_usuario" name="codigo_tipo_usuario" class="form-control">
                                <?php
                                    foreach($roles as $rol){
                                ?>
                                    <option value="<?=$rol['codigo_tipo_usuario']?>"><?=$rol['tipo_usuario']?></option>
                                    <?php } ?>                                     
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Contraseña:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="password" name="password"  placeholder="Ingresa las existencias del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="<?= PATH ?>/Usuarios/index">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>
        