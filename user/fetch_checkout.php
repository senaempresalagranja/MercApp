<?php
	include('session.php');
	if(isset($_POST['check'])){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th>Nombre del Producto</th>
				<th>Cantidad Disponible</th>
				<th>Precio Unitario</th>
				<th>Cantidad Solicitada</th>
				<th>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"SELECT * from `tbpedidoProducto` left join tbproducto on tbproducto.idProducto=tbpedidoProducto.idProducto left join tbpedido on tbpedido.idPedido= tbpedidoproducto.idPedido where tbpedido.idCliente='".$_SESSION['id']."' AND tbpedidoproducto.idPedido = '".$_SESSION['pedido']."' ");
				while($row=mysqli_fetch_array($query)){	
					?>
					<tr>
						<td><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-trash fa-fw"></i> Eliminar</button></td>
						<td><?php echo $row['nombre']; ?></td>
						<td><?php echo $row['existencia']; ?></td>
						<?php
							if (!($row['precioVenta'])) {
								echo "";
							}
							?>
						<td align="right"><?php echo number_format($row['precioVenta'],2); ?></td>
						<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
							<?php echo $row['cantidadPedida'];?>
						</td>
						<td align="right"><strong><span class="subt">
							<?php
								$subtotal=$row['precioVenta']*$row['cantidadPedida'];
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</span></strong></td>
					</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="5"><span class="pull-right"><strong>Total</strong></span></td>
				<td align="right"><strong><span id="total" ><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			</form>
			</tbody>
		</table>
		<?php
	}


?>