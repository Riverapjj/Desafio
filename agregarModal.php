<!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitulo">Agregar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="agregar.php" method="POST" class="row needs-validation" novalidate>
          <div class="col-md-12">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" class="form-control" id="codigo" name="codigo" required />
            <div class="invalid-feedback">Ingrese un código</div>
          </div>
          <div class="col-md-12">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required />
            <div class="invalid-feedback">Ingrese un nombre</div>
          </div>
          <div class="col-md-12">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" min="0" step="0.01" class="form-control" id="precio" name="precio" />
          </div>
          <div class="col-md-12">
            <label for="existencia" class="form-label">Existencias</label>
            <input type="number" min="1" class="form-control" id="existencia" name="existencia" required />
            <div class="invalid-feedback">Ingrese existencias</div>
          </div>
          <div class="col-md-12">
            <label for="img" class="form-label">Imagen</label>
            <input type="file" class="form-control form-control-sm" id="img" name="img" required />
          </div>
          <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            <div class="invalid-feedback">Ingrese una descripción</div>
          </div>
          <div class="col-md-12">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-control">
              <option value="Textil">Textil</option>
              <option value="Promocional">Promocional</option>
            </select>
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