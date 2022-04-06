<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de categorías</title>
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
                <h3>Lista de categoría</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Categorias/create"> Nuevo categoría</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 25%">Nombre</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($categorias as $categoria){
                        $codigo=$categoria['codigo_categoria'];
                    ?>
                            <tr>
                                <td><?=$categoria['codigo_categoria']?></td>
                                <td><?=$categoria['nombre_categoria']?></td>
                                <td>
                                    <a data-toggle="tooltip" title="Detalles"  class="btn btn-default btn-circle" href="javascript:void(0)" onclick="detalles('<?=$codigo?>')"><span class="glyphicon glyphicon-book"></span></a>
                                    <a title="Editar" class="btn btn-primary btn-circle" href="javascript:void(0)" onclick="updateDetails('<?=$codigo?>')"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a title="Eliminar"  class="btn btn-danger btn-circle" href="javascript:void(0)" onclick="deleteDetails('<?=$codigo?>')"><span class="glyphicon glyphicon-trash"></span></a>
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
                <h1 class="titulo-modal text-center"></h1>
            </div>
            <div class="modal-body form">
                <ul class="list-group">
                    <li class="list-group-item"><b>Nombre de categoría: </b> <span id="nombre"></span></li>
                </ul>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal-update" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="titulo-modal text-center"></h1>
            </div>
            <form role="form" action="<?= PATH ?>/Categorias/update" method="POST">
            <div class="modal-body form">
                
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6" style="display: none;">
                            <label for="codigo_categoria">Codigo de categoría:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_categoria" id="codigo_categoria" placeholder="Ingresa el codigo de categoría" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nombre_categoria">Nombre de categoría:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Editar" name="Guardar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal-delete" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="titulo-modal text-center"></h1>
            </div>
            <div class="modal-body form">   
                <h3 class="text-center">¿Deseas eliminar la categoría <b><span id="categoriaDelete"></span></b>?</h3>          
                <div class="modal-footer">
                    <a class="btn btn-danger" id="deleteButton">Eliminar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
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
            url: "<?=PATH?>/Categorias/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos){
                $('#nombre').text(datos.nombre_categoria);
                $('#modal').modal('show');
                $('.titulo-modal').text(datos.nombre_categoria);
            }
        })
    }
    
    function updateDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Categorias/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#codigo_categoria').val(datos.codigo_categoria);
                $('#nombre_categoria').val(datos.nombre_categoria);
                $('#modal-update').modal('show');
                $('.titulo-modal').text(datos.nombre_categoria);
            }
        })
    }

    function deleteDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Categorias/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#categoriaDelete').text(datos.nombre_categoria);
                $('#deleteButton').attr("href", "<?= PATH ?>/Categorias/delete/"+id);
                $('#modal-delete').modal('show');
                $('.titulo-modal').text(datos.nombre_categoria);
            }
        })
    }
   
</script>


    </body>
</html>