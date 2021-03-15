<?php
	ob_start();
	require_once 'core.php';
	$nombre = $_POST['nombre'];
  $nombre_archivo = explode(".", $nombre);
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
        <form id="form" action="<?php echo PATH;?>/editar_archivo_submit.php">
          <div class="form-group">
            <label class="small text-gray-600 form-label">Nombre del archivo</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nombre_viejo" name="nombre_viejo" value="<?php echo $nombre_archivo[0];?>" placeholder="Introduce el nombre del archivo">
                <span class="input-group-text" id="basic-addon2">.txt</span>
            </div>
          </div>
          <div class="form-group">
            <label class="small text-gray-600 form-label">Información del archivo</label>
            <textarea class="form-control" id="texto" name="texto" rows="4"><?php echo $funciones->LeerArchivo($nombre); ?></textarea>
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