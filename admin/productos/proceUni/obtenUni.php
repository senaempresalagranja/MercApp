<?php

require_once "../clases/conexion.php";
require_once "../crudUni/crudUni.php";

$obj = new crudUnidadMedida();

echo json_encode($obj->obtenerUnidadMedida($_POST['idUnidadMedida']));
