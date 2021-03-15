<?php
    @session_start();
    error_reporting(0);
	define( 'CHARSET','UTF-8' );
	header( 'Content-type: text/html; charset='.CHARSET );
    define("PATH", "http://localhost/israel"); // Url de la página
    require_once 'funciones.php';
    $funciones=new funciones();
?>