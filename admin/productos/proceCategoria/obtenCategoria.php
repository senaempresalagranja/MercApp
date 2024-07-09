<?php

require_once "../clases/conexion.php";
require_once "../crudCategoria/crudCategoria.php";

$obj = new crudCategoria();

echo json_encode($obj->obtenerCategoria($_POST['idCategoria']));
