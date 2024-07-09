<?php
	include('session.php');
	if(isset($_POST['min'])){
		$id=$_POST['id'];
		
		$query=mysqli_query($conn,"SELECT * from tbpedidoProducto  where idProducto='$id' and idPedido= '" . $_SESSION['pedido']."'");
		$row=mysqli_fetch_array($query);
		
		$newqty=$row['cantidadPedida']-1;
		
		if ($newqty==0){
			mysqli_query($conn,"DELETE from tbpedidoProducto  where idProducto='$id' and idPedido= '" . $_SESSION['pedido']."'");
		}
		else{
			mysqli_query($conn,"UPDATE tbpedidoProducto  set cantidadPedida='$newqty' where idProducto='$id' and idPedido= '" . $_SESSION['pedido']."'"	);
		}
		
	}

?>