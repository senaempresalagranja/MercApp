<?php



$conexion=mysqli_connect('localhost','root','','dbmercapp');
$datos = mysqli_query($conexion,"SELECT  idPedido, indicador  FROM `tbpedido`  WHERE `indicador` =  '1' OR `indicador` = '2'");
$hora = mysqli_fetch_assoc($datos);
$cantidad = mysqli_num_rows($datos);
$mensaje= "hay $cantidad pedidos pendientes";
$datos_push = array('mensaje' => "hay $cantidad pedidos pendientes" );

echo json_encode($datos_push);




?>