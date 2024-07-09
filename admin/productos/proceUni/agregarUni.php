<?php
require_once "../clases/conexion.php";
require_once "../crudUni/crudUni.php";
$obj = new crudUnidadMedida();

$datos = array(
   
    $_POST['unidadMedida']
	);

echo $obj ->agregarUnidadMedida($datos);
