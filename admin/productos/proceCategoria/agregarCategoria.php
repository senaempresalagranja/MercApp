<?php
require_once "../clases/conexion.php";
require_once "../crudCategoria/crudCategoria.php";
$obj = new crudCategoria();

$datos = array(

    $_POST['nombre']
	);

echo $obj ->agregarCategoria($datos);
