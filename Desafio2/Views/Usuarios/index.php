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
                <h3>Lista de usuarios</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Usuarios/create"> Nuevo usuario</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 25%">Nombre</th>
                            <th>Tipo de usuario</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($usuarios as $usuario){
                        $codigo=$usuario['codigo_usuario'];
                    ?>
                            <tr>
                                <td><?=$usuario['codigo_usuario']?></td>
                                <td><?=$usuario['nombre_usuario']?></td>
                                <td><?=$usuario['tipo_usuario']?></td>
                                <td><?=$usuario['activo'] == 1 ? 'Activo' : 'Inactivo'?></td>
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
                    <li class="list-group-item"><b>Nombre de usuario: </b> <span id="nombre_usuario"></span></li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item"><b>Tipo de usuario: </b> <span id="tipo_usuario"></span></li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item"><b>Estado: </b> <span id="estado"></span></li>
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
            <form role="form" action="<?= PATH ?>/Usuarios/update" method="POST">
            <div class="modal-body form">
                
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6" style="display:none;">
                            <label for="codigo_usuario">Codigo de usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_usuario" id="codigo_usuario" placeholder="Ingresa el codigo de categoría" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nombre_usuario">Nombre de usuario:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="codigo_tipo_usuario">Tipo de usuario:</label>
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
                        <div class="form-group col-md-12">
                            <label for="estado">Estado:</label>
                            <div class="input-group">
                                <select id="activo" name="activo" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
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
            url: "<?=PATH?>/Usuarios/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos){
                
                datos.activo = 1 ? 'Activo' : 'Inactivo';

                $('#nombre_usuario').text(datos.nombre_usuario);
                $('#tipo_usuario').text(datos.tipo_usuario);
                $('#estado').text(datos.activo);
                $('#modal').modal('show');
                $('.titulo-modal').text('Datos de usuario');
            }
        })
    }
    
    function updateDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Usuarios/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#codigo_usuario').val(datos.codigo_usuario);
                $('#codigo_tipo_usuario').val(datos.codigo_tipo_usuario);
                $('input#nombre_usuario').val(datos.nombre_usuario);
                $('#activo').val(datos.activo);
                $('#modal-update').modal('show');
                $('.titulo-modal').text('Editar usuario');
            }
        })
    }
   
</script>


    </body>
</html>