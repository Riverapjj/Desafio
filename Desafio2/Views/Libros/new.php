<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo editorial</title>
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
                <h3>Nuevo libro</h3>
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
                    <form role="form" action="<?= PATH ?>/Libros/add" method="POST">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6">
                            <label for="codigo">Codigo del libro:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_libro" id="codigo_libro" placeholder="Ingresa el codigo del libro" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre del libro:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_libro" id="nombre_libro"  placeholder="Ingresa el nombre del libro"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="existencias">Existencias:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="existencias" name="existencias"  placeholder="Ingresa las existencias del libro" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio">Precio:</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" id="precio" name="precio"  placeholder="Ingresa el precio del libro" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="autor">Autor:</label>
                            <div class="input-group">
                                <select id="codigo_autor" name="codigo_autor" class="form-control">
                                <?php
                                    foreach($autores as $autor){
                                ?>
                                    <option value="<?=$autor['codigo_autor']?>"><?=$autor['nombre_autor']?></option>
                                    <?php } ?>                                     
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editorial">Editorial:</label>
                            <div class="input-group">
                                <select id="codigo_editorial" name="codigo_editorial" class="form-control">
                                <?php
                                    foreach($editoriales as $editorial){
                                ?>
                                    <option value="<?=$editorial['codigo_editorial']?>"><?=$editorial['nombre_editorial']?></option>
                                    <?php } ?>  
                                </select>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="genero">Genero:</label>
                            <div class="input-group">
                                <select id="genero" name="genero" class="form-control">
                                    
                                </select>
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
                        <a class="btn btn-danger" href="<?= PATH ?>/Libros/index">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>
        <script>
            $('#codigo_autor').select2();
            $('#codigo_editorial').select2();
        </script>
</body>
</html>
        