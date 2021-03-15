<?php
require 'core.php';
$page = 1;
require 'header.php';
$action = $_GET['action'];
if (isset($_POST['crear_archivo'])) {
    $funciones->CrearArchivo();
}
if (isset($_POST['borrar_archivo'])) {
    $funciones->BorrarArchivo();
}
?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 padding-0_75r mb-4">
            <div class="card">
                <div class="card-header">Archivos de textos</div>
                <div class="card-body">
                <nav class="nav nav-borders">
                    <a class="nav-link ml-0 <?php if($action !== "mostrar"){ echo 'active'; } ?>" href="<?php echo PATH;?>/index.php">Crear</a>
                    <a class="nav-link <?php if($action == "mostrar"){ echo 'active'; } ?>" href="<?php echo PATH;?>/index.php?action=mostrar">Mostrar</a>
                </nav>
                <hr class="mt-0">
                <?php
                    if($action == "mostrar"){
                        require 'mostrar_archivo.php';
                    }else{
                        require 'crear_archivo.php';
                    }
                ?>                    
                </div>
            </div>
        </div>
    </div>
</div>