<form action="directorios.php" method="post">
<?php if(isset($_SESSION['alert_directorio_crear'])){?>
    <div class="alert <?php echo $_SESSION['type_alert_directorio_crear'];?>" role="alert">
        <?php echo $_SESSION['alert_directorio_crear'];?>
    </div>
<?php }?>
    <div class="form-group">
        <label class="small text-gray-600 form-label">Nombre del directorio</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $_SESSION['nombre'];?>" placeholder="Introduce el nombre del directorio"></input>
    </div>
    <input class="btn btn-primary mt-3" name="crear_directorio" type="submit" value="Crear directorio">
</form>
<?php if($_SESSION['alert_directorio_crear']){unset($_SESSION['alert_directorio_crear']);unset($_SESSION['type_alert_directorio_crear']);unset($_SESSION['nombre']);} ?>