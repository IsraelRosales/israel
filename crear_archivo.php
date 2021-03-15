<form action="index.php" method="post">
<?php if(isset($_SESSION['alert_archivo_crear'])){?>
    <div class="alert <?php echo $_SESSION['type_alert_archivo_crear'];?>" role="alert">
        <?php echo $_SESSION['alert_archivo_crear'];?>
    </div>
<?php }?>
    <div class="form-group">
        <label class="small text-gray-600 form-label">Nombre del archivo</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nombre" value="<?php echo $_SESSION['nombre'];?>" placeholder="Introduce el nombre del archivo">
            <span class="input-group-text" id="basic-addon2">.txt</span>
        </div>
    </div>
    <div class="form-group">
        <label class="small text-gray-600 form-label">Información del archivo</label>
        <textarea class="form-control" name="texto" rows="4"><?php echo $_SESSION['texto'];?></textarea>
    </div>
    <input class="btn btn-primary mt-3" name="crear_archivo" type="submit" value="Crear archivo">
</form>
<?php if($_SESSION['alert_archivo_crear']){unset($_SESSION['alert_archivo_crear']);unset($_SESSION['type_alert_archivo_crear']);unset($_SESSION['nombre']);unset($_SESSION['texto']);} ?>