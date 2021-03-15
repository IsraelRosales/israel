<?php if(isset($_SESSION['alert_directorio'])){?>
    <div class="alert <?php echo $_SESSION['type_alert_directorio'];?>" role="alert">
        <?php echo $_SESSION['alert_directorio'];?>
    </div>
<?php }?>
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Directorio</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
    <?php
        $funciones->MostrarDirectorios();
    ?>
</table>
<div id="mostrar_modal"></div>
<?php if($_SESSION['alert_directorio']){unset($_SESSION['alert_directorio']);unset($_SESSION['type_alert_directorio']);unset($_SESSION['nombre']);} ?>