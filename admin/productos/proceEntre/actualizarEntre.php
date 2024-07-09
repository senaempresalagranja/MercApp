<?php
require_once "../clases/conexion.php";
require_once "../crudEntre/crudEntre.php";
$obj = new crudEntre();



$datos = array(
    $_POST['codigoLoteU'],
    $_POST['responsableProduccionU'],
    $_POST['fechaProduccionU'],
    $_POST['idProductoU'],
    $_POST['cantidadU'], 
    $_POST['fechaVencimientoU'],
    $_POST['valorUnitarioU'],
    $_POST['idEntradaU'],
    $_POST['fechaU'],
    $_POST['responsableRcibirU'],
    $_POST['horaEntradaU'],
    $_POST['cantidadEntrarU'],
    $_POST['valorTotalU'],
    $_POST['idLoteU'],
    $_POST['idLoteProductoU']
);
echo $obj ->actualizarEntra($datos);

