<?php
require_once "../clases/conexion.php";
require_once "../crudDevo/crudDevo.php";
$obj = new crudDevo();

$datos = array(
    $_POST['idTrasladoU'],
    $_POST['fechaU'],
    $_POST['idUnidadU'],
    $_POST['causaU'],
    $_POST['referenciaU'],
    $_POST['responsableRecepcionU'],
    $_POST['idProductoU'],
    $_POST['cantidadU'],
    $_POST['descripcionCausaU'],
    $_POST['idTrasladoProductoU']
    );

echo $obj-> actualizarDevo($datos);
?>
