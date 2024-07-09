<?php
require_once "../clases/conexion.php";
require_once "../crudUnidad/crudUnidad.php";
$obj = new crudUnidad();

$datos = array(

    $_POST['nombre'],
    $_POST['idArea']
	);

echo $obj ->agregarUnidad($datos);
