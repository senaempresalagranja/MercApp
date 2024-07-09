<?php

require_once "../clases/conexion.php";
require_once "../crudPersona/crudPersona.php";

$obj = new crudPersona();

echo json_encode($obj->obtenerPersona($_POST['idPersona']));
