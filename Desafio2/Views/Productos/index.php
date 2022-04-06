<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
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
                <h3>Lista de productos</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Productos/create"> Nuevo producto</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th style="width: 25%">Nombre</th>
                            <th>Categoria</th>
                            <th>Talla</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($productos as $producto) {
                        $codigo=$producto['codigo_producto'];
                    ?>
                            <tr>
                                <td><?=$producto['codigo_producto']?></td>
                                <td><?=$producto['nombre_producto']?></td>
                                <td><?=$producto['nombre_categoria']?></td>
                                <td><?=$producto['talla']?></td>
                                <td><?=$producto['descripcion']?></td>
                                <td><?=$producto['precio']?></td>
                                <td><?=$producto['existencias']?></td>
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
                    <li class="list-group-item"><b>Nombre del producto: </b> <span id="nombre"></span></li>
                    <li class="list-group-item"><b>Nombre de categoría: </b> <span id="categoria"></span></li>
                    <li class="list-group-item"><b>Precio: </b> <span id="precio"></span></li>
                    <li class="list-group-item"><b>Talla: </b> <span id="talla"></span></li>
                    <li class="list-group-item"><b>Descripción: </b> <span id="descripcion"></span></li>
                    <li class="list-group-item"><b>Existencias: </b> <span id="existencias"></span></li>
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
            <form role="form" action="<?= PATH ?>/Productos/update" method="POST">
            <div class="modal-body form">
                
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group col-md-6" style="display: none;">
                            <label for="codigo_producto">Codigo de producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" placeholder="Ingresa el codigo de categoría" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nombre_producto">Nombre del producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_producto" id="nombre_producto"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
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
                        <div class="form-group col-md-12">
                            <label for="talla">Talla:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="talla" id="talla"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="precio">Precio:</label>
                            <div class="input-group">
                                <input type="number" step="0.01" class="form-control" name="precio" id="precio"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="existencias">Existencias:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="existencias" id="existencias"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="imagen">Imagen:</label>
                            <!--<input type="text" class="form-control" name="hold_image" id="hold_image"  placeholder="Ingresa el nombre de categoría"  >-->
                            <div class="input-group">
                                <input type="file" class="form-control" name="imagen" id="imagen"  placeholder="Ingresa el nombre de categoría"  >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripción:</label>
                            <div class="input-group">
                                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
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
                <h3 class="text-center">¿Deseas eliminar el producto <b><span id="productoDelete"></span></b>?</h3>          
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
            url: "<?=PATH?>/Productos/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos){
                $('#nombre').text(datos.nombre_producto);
                $('#categoria').text(datos.nombre_categoria);
                $('#precio').text(datos.precio);
                $('#talla').text(datos.talla);
                $('#existencias').text(datos.existencias);
                $('#descripcion').text(datos.descripcion);
                $('#modal').modal('show');
                $('.titulo-modal').text(datos.nombre_producto);
            }
        })
    }
    
    function updateDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Productos/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#codigo_producto').val(datos.codigo_producto);
                $('#nombre_producto').val(datos.nombre_producto);
                $('#nombre_categoria').val(datos.nombre_categoria);
                $('#codigo_categoria').val(datos.codigo_categoria);
                $('input#hold_image').val(datos.imagen);
                $('input#precio').val(datos.precio);
                $('input#talla').val(datos.talla);
                $('input#existencias').val(datos.existencias);
                $('textarea#descripcion').val(datos.descripcion);
                $('#modal-update').modal('show');
                $('.titulo-modal').text(datos.nombre_producto);
            }
        })
    }

    function deleteDetails(id) {
        $.ajax({
            url: "<?=PATH?>/Productos/details/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(datos) {
                $('#productoDelete').text(datos.nombre_producto);
                $('#deleteButton').attr("href", "<?= PATH ?>/Productos/delete/"+id);
                $('#modal-delete').modal('show');
                $('.titulo-modal').text(datos.nombre_producto);
            }
        })
    }
   
</script>


    </body>
</html>