<?php

require_once "../clases/conexion.php";
require_once "../crudDevo/crudDevo.php";

$obj = new crudDevo();

echo json_encode($obj->obtenDevo($_POST['idTraslado']));
