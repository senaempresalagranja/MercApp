<?php
require_once "../clases/conexion.php";
require_once "../crudArea/crudArea.php";
$obj = new crudArea();

$datos = array(
    $_POST['nombre']
	);

echo $obj ->agregarArea($datos);
