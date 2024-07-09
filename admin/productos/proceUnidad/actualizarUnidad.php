<?php
require_once "../clases/conexion.php";
require_once "../crudUnidad/crudUnidad.php";
$obj = new crudUnidad();

$datos = array(
    $_POST['idUnidadU'],
    $_POST['nombreU'],
    $_POST['idAreaU']
    );

echo $obj-> actualizarUnidad($datos);
?>
