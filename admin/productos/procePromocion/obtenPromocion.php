<?php

require_once "../clases/conexion.php";
require_once "../crudPromocion/crudPromocion.php";

$obj = new crudPromocion();

echo json_encode($obj->obtenPromocion($_POST['idPromocion']));
