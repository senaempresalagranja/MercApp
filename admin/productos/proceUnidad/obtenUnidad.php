<?php

require_once "../clases/conexion.php";
require_once "../crudUnidad/crudUnidad.php";

$obj = new crudUnidad();

echo json_encode($obj->obtenerUnidad($_POST['idUnidad']));
