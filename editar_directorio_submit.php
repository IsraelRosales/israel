<?php
	ob_start();
	require_once 'core.php';
	$nombre = $_POST['nombre'];
	$nombre_nuevo = $_POST['nombre_nuevo'];
	$funciones->EditarDirectorio($nombre, $nombre_nuevo);
?>