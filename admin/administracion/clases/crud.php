<?php 

	class crud{
		

		public function confirmar($idPedido){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE `tbpedido` SET `indicador`='2' WHERE idPedido= $idPedido";
			return mysqli_query($conexion,$sql);
		}
		public function despachar($datos)
		{
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="UPDATE `tbpedido` SET `indicador`='3' WHERE idPedido= $datos[0]";
			return mysqli_query($conexion, $sql);
			// $compra=$datos[2];
			// $puntos =0;
			// while ( $compra >= 5000) {
			// 	$puntos += 10;
			// 	$compra -= 5000;
				
			// }
			

			// if (in_array($datos[2], range(5000-9999))) {

			// 	$punto= "INSERT INTO `tbpunto`( `idCliente`, `idPedido`, `fechaVencimientoPunto`, `estadoPunto`) VALUES ('$datos[1]','$datos[0],')";
			// }
			




		}
		public function activar($idProducto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE `tbproducto` SET `indicador`='1' WHERE idProducto= $idProducto";
			return mysqli_query($conexion,$sql);
		}
		
		public function desactivar($idProducto){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE `tbproducto` SET `indicador`='0' WHERE idProducto= $idProducto";
			return mysqli_query($conexion,$sql);
		}
		
	}

 ?>