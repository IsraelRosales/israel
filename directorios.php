<?php
require 'core.php';
$page = 2;
require 'header.php';
$action = $_GET['action'];
if (isset($_POST['crear_directorio'])) {
    $funciones->CrearDirectorio();
}
if (isset($_POST['borrar_archivo'])) {
    $funciones->BorrarDirectorio();
}
?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 padding-0_75r mb-4">
            <div class="card">
                <div class="card-header">Directorios</div>
                <div class="card-body">
                <nav class="nav nav-borders">
                    <a class="nav-link ml-0 <?php if($action !== "mostrar"){ echo 'active'; } ?>" href="<?php echo PATH;?>/directorios.php">Crear</a>
                    <a class="nav-link <?php if($action == "mostrar"){ echo 'active'; } ?>" href="<?php echo PATH;?>/directorios.php?action=mostrar">Mostrar</a>
                </nav>
                <hr class="mt-0">
                <?php
                    if($action == "mostrar"){
                        require 'mostrar_directorios.php';
                    }else{
                        require 'crear_directorio.php';
                    }
                ?>                    
                </div>
            </div>
        </div>
    </div>
</div>