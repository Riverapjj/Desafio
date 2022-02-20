<div class="modal fade" id="borrar_<?=$producto->codigo;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrar producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center">¿Estás seguro de borrar este producto?</p>
        <h2 class="text-center"><?=$producto->nombre?></h2>
      
      <input type="text" value="<?=$index;?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="borrar.php?cod=<?=$producto->codigo;?>" class="btn btn-danger">Confirmar</a>
      </div>
    </div>
  </div>
</div>