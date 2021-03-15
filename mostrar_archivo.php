<?php if(isset($_SESSION['alert_archivo'])){?>
    <div class="alert <?php echo $_SESSION['type_alert_archivo'];?>" role="alert">
        <?php echo $_SESSION['alert_archivo'];?>
    </div>
<?php }?>
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Archivo</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
    <?php
        $funciones->MostrarArchivos();
    ?>
</table>
<div id="mostrar_modal"></div>
<?php if($_SESSION['alert_archivo']){unset($_SESSION['alert_archivo']);unset($_SESSION['type_alert_archivo']);unset($_SESSION['nombre']);} ?>