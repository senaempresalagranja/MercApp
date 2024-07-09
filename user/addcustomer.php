<?php
	include('../conn.php');
require_once "cruduser.php";

$obj = new cruduser();

$datos = array(
    $_POST['nombrecliente'],
    $_POST['telefono'],
    $_POST['email'],
    $_POST['tipocliente'],
    $_POST['cuentas'],
    md5($_POST['contrasenas'])

	);

echo $obj ->agregaruser($datos);


