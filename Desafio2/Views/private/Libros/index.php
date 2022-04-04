<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de libros</title>
    <?php
        include 'views/cabecera.php';
    ?>
</head>
<body>
<?php
        include 'views/menu.php';
    ?>

<div class="container">
            <div class="row">
                <h3>Lista de libros</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Libros/create"> Nuevo libro</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 25%">Nombre</th>
                            <th>Existencias</th>
                            <th>Precio</th>
                            <th>Editorial</th>
                            <th>Autor</th>
                            <th>Genero</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($libros as $libro){
                        $codigo=$libro['codigo_libro'];
                    ?>
                            <tr>
                                <td><?=$libro['codigo_libro']?></td>
                                <td><?=$libro['nombre_libro']?></td>
                                <td><?=$libro['existencias']?></td>
                                <td><?=$libro['precio']?></td>
                                <td><?=$libro['nombre_editorial']?></td>
                                <td><?=$libro['nombre_autor']?></td>
                                <td><?=$libro['nombre_genero']?></td>
                                <td>
                                    <a data-toggle="tooltip" title="Detalles"  class="btn btn-default btn-circle" href="javascript:void(0)" onclick="detalles('<?=$codigo?>')"><span class="glyphicon glyphicon-book"></span></a>
                                    <a title="Editar" class="btn btn-primary btn-circle" href="#"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a title="Eliminar"  class="btn btn-danger btn-circle" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php
                    }
                    ?>
                      
                            
                   
                    </tbody>
                </table>
                </div>
                
            </div>                    
        </div> 
                
<!-- Bootstrap modal -->
<div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="titulo-modal"></h3>
            </div>
            <div class="modal-body form">
                <ul class="list-group">
                    <li class="list-group-item"><b>Nombre del libro: </b> <span id="nombre"></span></li>
                    <li class="list-group-item"> <b>Precio: </b> $<span id="precio"></span></li>
                    <li class="list-group-item"> <b>Existencias: </b> <span id="existencias"></span></li>
                    <li class="list-group-item"> <b>Autor: </b> <span id="autor"></span></li>
                    <li class="list-group-item"> <b>Editorial: </b> <span id="editorial"></span></li>
                    <li class="list-group-item"> <b>Genero: </b> <span id="genero"></span></li>
                </ul>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
    $(document).ready(function () {
        $('#tabla').DataTable();
    });
    
    function detalles(id){
        $.ajax({
            url: "<?=PATH?>/Libros/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos){
                $('#nombre').text(datos.nombre_libro);
                $('#precio').text(datos.precio);
                $('#existencias').text(datos.existencias);
                $('#autor').text(datos.nombre_autor);
                $('#editorial').text(datos.nombre_editorial);
                $('#genero').text(datos.nombre_genero);
                $('#modal').modal('show');
                $('.titulo-modal').text(datos.nombre_libro);
            }
        })
    }
    
   
</script>


    </body>
</html>