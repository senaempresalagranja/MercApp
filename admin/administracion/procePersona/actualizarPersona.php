<?php
require_once "../clases/conexion.php";
require_once "../crudPersona/crudPersona.php";
$obj = new crudPersona();

$datos = array(
    $_POST['idPersonaU'],
    $_POST['nombreU'],
    $_POST['apellidoU'],
    $_POST['telefonoU'],
    $_POST['emailU'],
    $_POST['ocupacionU']

    );

echo $obj-> actualizarPersona($datos);
?>
