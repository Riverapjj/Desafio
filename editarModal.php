<!-- Modal -->
<div class="modal fade" id="editar_<?=$producto->codigo;?>" tabindex="-1" aria-labelledby="agregar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitulo">Editar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="editar.php" method="POST" class="row g-2">
          <div class="col-md-6">
            <div class="form-floating">
              <input hidden type="text" class="form-control" id="index" name="index" value="<?=$index;?>"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="codigo" name="codigo" value="<?=$producto->codigo;?>" required />
              <label for="codigo">Código</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$producto->nombre;?>" required />
              <label for="nombre">Nombre</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="number" min="0" step="0.01" class="form-control" id="precio" name="precio" value="<?=$producto->precio;?>" required />
              <label for="precio">Precio</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-floating">
              <input type="number" min="1" class="form-control" id="existencia" name="existencia" value="<?=$producto->existencias;?>" required />
              <label for="existencia">Existencias</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating input-group">
              <input type="file" class="form-control form-control-sm" id="img" name="img" value="<?=$producto->img;?>" required />
              <label for="img">Imagen</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating">
              <textarea class="form-control" id="descripcion" name="descripcion" required><?=$producto->descripcion;?></textarea>
              <label for="descripcion">Descripción</label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating">
              <select name="categoria" id="categoria" class="form-select">
                <?php
                  
                  if ((string) $producto->categoria == "Textil")
                  {
                    $categoria = $producto->categoria;
                    echo "<option value='$categoria'>Textil</option>  
                          <option value='Promocional'>Promocional</option>";
                  }
                  else {

                    $categoria = $producto->categoria;
                    echo "<option value='$categoria'>Promocional</option>  
                          <option value='Textil'>Textil</option>";
                  }
                ?>
              </select>
              <label for="categoria">Categoría</label>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>

      </form>
      </div>
    </div>
  </div>
</div>