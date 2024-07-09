<?php
require_once "../clases/conexion.php";
require_once "../crudDevo/crudDevo.php";
$obj = new crudDevo();

$datos = array(
	$_POST['tipoCausa'],
    $_POST['fecha'],
    $_POST['idUnidad'],
    $_POST['causa'],
    $_POST['referencia'],
    $_POST['responsableRecepcion'],
    $_POST['idProducto'],
    $_POST['cantidad'],
    $_POST['descripcionCausa']
	);

echo $obj ->agregarDevo($datos);
