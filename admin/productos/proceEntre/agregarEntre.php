<?php
require_once "../clases/conexion.php";
require_once "../crudEntre/crudEntre.php";
$obj = new crudEntre();

$datos = array(
    $_POST['codigoLote'],
    $_POST['responsableProduccion'],
    $_POST['fechaProduccion'],
    $_POST['idProducto'],
    $_POST['cantidad'], 
    $_POST['fechaVencimiento'],
    $_POST['valorUnitario'],
    $_POST['fecha'],
    $_POST['responsableRcibir'],
    $_POST['horaEntrada'],
    $_POST['cantidadEntrar'],
    $_POST['valorTotal']
	);

echo $obj ->agregarEntre($datos);
