<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();
	$con=new conectar();
	$conexion = $con->conexion();
	$query = mysqli_query($conexion, "SELECT * FROM tbpedido WHERE idPedido = $_POST[idPedido]");
	$row= mysqli_fetch_assoc($query);
	$datos=array(
		$_POST['idPedido'],
		$row['idCliente'],
		$row['valorPedidoRealizado']
		
				);

	echo $obj->despachar($datos);
	

 ?>