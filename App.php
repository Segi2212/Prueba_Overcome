<?php
include('API.php');

$accion = $_GET['accion'];

$api = new apiPruebaOvercome();

switch($accion){

    //consulta de estatus
    case 1:
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $data = $api -> crearUsuario($nombre, $contrasena);
        echo $data;
    break;

    
}
?>