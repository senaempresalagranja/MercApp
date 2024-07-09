<?php

require_once "../clases/conexion.php";
require_once "../crudEntre/crudEntre.php";

$obj = new crudEntre();


echo json_encode($obj->obtentra($_POST['idEntrada']));
