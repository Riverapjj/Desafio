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
                <h3>Nueva categoría</h3>
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
                    <form role="form" action="<?= PATH ?>/Roles/add" method="POST">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6">
                            <label for="tipo_usuario">Nombre tipo de usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="<?= PATH ?>/Roles/index">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>
</body>
</html>
        