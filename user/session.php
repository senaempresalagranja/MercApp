<?php
	session_start();
	
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '' || $_SESSION['rol']!="usuarioCliente")) {
		session_destroy();
		clearstatcache();
	header('location:../index.php');
    exit();
	}
	
	
	include('../conn.php');

	$sq=mysqli_query($conn,"SELECT * from `tbusuario` where idusuario='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
	
	$user=$srow['cuenta'];
	if (!isset($_SESSION['pedido'])) {
		$query2 = mysqli_query($conn, "SELECT * FROM tbpedido  WHERE  idCliente='" . $_SESSION['id'] . "' AND indicador = 0  ORDER BY idPedido DESC LIMIT 1");  
		$session = mysqli_fetch_assoc($query2);
		$_SESSION['pedido'] = $session['idPedido'];
		if ( $_SESSION['pedido'] == "" || $_SESSION['pedido'] == null) {
		   unset($_SESSION['pedido']);
		   clearstatcache();
		}
	}

?>