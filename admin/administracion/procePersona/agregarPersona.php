<?php
require_once "../clases/conexion.php";
require_once "../crudPersona/crudPersona.php";
$obj = new crudPersona();

$datos = array(
    $_POST['nombre'],
    $_POST['apellido'],
    $_POST['telefono'],
    $_POST['email'],
    $_POST['ocupacion'],
    $_POST['indicador']
	);

echo $obj ->agregarPersona($datos);
