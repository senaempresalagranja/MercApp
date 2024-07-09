<?php
require_once "../clases/conexion.php";
require_once "../crudArea/crudArea.php";
$obj = new crudArea();

$datos = array(
    $_POST['idAreaU'],
    $_POST['nombreU']
    );

echo $obj-> actualizarArea($datos);
?>
