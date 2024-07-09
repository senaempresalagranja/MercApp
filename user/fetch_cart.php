<?php
	include('session.php');
	if (!isset($_SESSION['pedido'])){
		echo "Tu carrito esta vacio <br><br>";
	}else{
		if(isset($_POST['fcart'])){
			$query=mysqli_query($conn,"SELECT * from `tbpedidoProducto` left join tbproducto on tbproducto.idProducto=tbpedidoProducto.idProducto left join tbpedido on tbpedido.idPedido= tbpedidoproducto.idPedido where tbpedido.idCliente='".$_SESSION['id']."' AND tbpedidoproducto.idPedido = '".$_SESSION['pedido']."' ")or die ("no sirve el select pedido producto");
		
			if (mysqli_num_rows($query)<1){
				echo $_SESSION['id'];
				echo "Tu carrito esta vacio <br><br>";
			}
			else{
			while($row=mysqli_fetch_array($query)){
				?>
				<div class="row col-lg-12 col-sm-12 col-xs-12 " style="overflow-y:auto; overflow-x:hidden;">
					<div class="col-lg-2 col-sm-2 col-xs-2">
						<button type="button" class="btn btn-danger btn-sm remove_product" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-times fa-fw"></i></button> 
					</div>
					<div class="col-lg-2 col-sm-2 col-xs-2">
						<button type="button" class="btn btn-warning btn-sm minus_qty" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
					</div>
					<div class="col-lg-1 col-sm-1 col-xs-1" style="text-align:center; position:relative; top:4px; left:10px;">
						<span class="pull-right"><strong><?php echo $row['cantidadPedida']; ?></strong></span>
					</div>
					<div class="col-lg-2col-sm-2 col-xs-2">
						<button type="button"class="btn btn-primary btn-sm add_qty" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
					</div>
					<div class="col-lg-2 col-sm-2 col-xs-2">
						<img src="../admin/productos/imagenes/<?php if (empty($row['foto'])){echo "upload/noimage.jpg";}else{echo $row['foto'];} ?>" style="width: 30px; height:30px; position:relative; left:5px;" class="thumbnail">
					</div>
					<div class="col-lg-2 col-sm-2 col-xs-2">
						<span style="font-size:11px; position:relative; left:10px; top:3px;"><?php echo $row['nombre']; ?></span>
					</div>
				</div>
				<?php
			}
			}
		}
	}
	

?>