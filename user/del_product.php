<?php
	include('session.php');
	if(isset($_POST['rem'])){
		$id=$_POST['id'];
		
		mysqli_query($conn,"delete from tbpedidoProducto  where idProducto='$id' and idPedido= '" . $_SESSION['pedido']."'");
	}
?>