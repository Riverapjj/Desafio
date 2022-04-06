<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tipos de usuario</title>
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
                <h3>Lista de tipos de usuario</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Roles/create"> Nuevo tipo de usuario</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 25%">Tipo de usuario</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($roles as $rol){
                        $codigo=$rol['codigo_tipo_usuario'];
                    ?>
                            <tr>
                                <td><?=$rol['codigo_tipo_usuario']?></td>
                                <td><?=$rol['tipo_usuario']?></td>
                                <td>
                                    <a data-toggle="tooltip" title="Detalles"  class="btn btn-default btn-circle" href="javascript:void(0)" onclick="detalles('<?=$codigo?>')"><span class="glyphicon glyphicon-book"></span></a>
                                    <a title="Editar" class="btn btn-primary btn-circle" href="javascript:void(0)" onclick="updateDetails('<?=$codigo?>')"><span class="glyphicon glyphicon-edit"></span></a>
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
                    <li class="list-group-item"><b>Nombre tipo de uaurio: </b> <span id="nombre"></span></li>
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
            <form role="form" action="<?= PATH ?>/Roles/update" method="POST">
            <div class="modal-body form">
                
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6" style="display: none;">
                            <label for="codigo_tipo_usuario">Codigo tipo de usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_tipo_usuario" id="codigo_tipo_usuario" placeholder="Ingresa el codigo tipo de usuario" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tipo_usuario">Nombre tipo de usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="tipo_usuario" id="tipo_usuario"  placeholder="Ingresa el nombre tipo de usuario"  >
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

<script>
    $(document).ready(function () {
        $('#tabla').DataTable();
    });
    
    function detalles(id){
        $.ajax({
            url: "<?=PATH?>/Roles/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos){
                $('#nombre').text(datos.tipo_usuario);
                $('#modal').modal('show');
                $('.titulo-modal').text(datos.tipo_usuario);
            }
        })
    }
    
    function updateDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Roles/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#codigo_tipo_usuario').val(datos.codigo_tipo_usuario);
                $('#tipo_usuario').val(datos.tipo_usuario);
                $('#modal-update').modal('show');
                $('.titulo-modal').text(datos.tipo_usuario);
            }
        })
    }   
</script>


    </body>
</html>