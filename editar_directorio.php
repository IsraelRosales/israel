<?php
	ob_start();
	require_once 'core.php';
	$nombre = $_POST['nombre'];
?>
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editando: <?php echo $nombre;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="mostrar_mensaje"></div>
        <form id="form" action="<?php echo PATH;?>/editar_directorio_submit.php">
          <div class="form-group">
            <label class="small text-gray-600 form-label">Nombre del directorio</label>
            <input type="text" class="form-control" name="nombre_nuevo" value="<?php echo $nombre;?>" placeholder="Introduce el nombre del directorio"></input>
          </div>       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="EditarArchivo('<?php echo $nombre;?>')">Guardar cambios</button>
      </div>
    </div>
  </div>
</div>
<?php
  require 'bloquear_input.php';
?>