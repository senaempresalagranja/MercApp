<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	if(isset($_POST['idProducto'])){
		echo $obj->activar($_POST['idProducto']);
	}

	
	

 ?>