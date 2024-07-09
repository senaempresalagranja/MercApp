<?php

require_once "../clases/conexion.php";
require_once "../crudArea/crudArea.php";

$obj = new crudArea();

echo json_encode($obj->obtenerArea($_POST['idArea']));
