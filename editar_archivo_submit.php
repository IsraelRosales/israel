<?php
	ob_start();
	require_once 'core.php';
	$nombre = $_POST['nombre'];
	$nombre_viejo = $_POST['nombre_viejo'];
	$texto = $_POST['texto'];
	$funciones->EditarArchivo($nombre, $nombre_viejo, $texto);
?>