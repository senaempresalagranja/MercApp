
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT  idPedido, valorPedidoRealizado, fechaPedido, tbcliente.nombre , tbcliente.telefono , tbcliente.tipoCliente , `horaEntregaPedido` , indicador, tbcliente.idCliente   FROM `tbpedido` INNER JOIN tbcliente on tbcliente.idCliente = tbpedido.idCliente WHERE `indicador` =  '3'";
$result=mysqli_query($conexion,$sql);
?>


<div>
<?php
		$inc=4;
		$query=mysqli_query($conexion,"select * from tbproducto ");
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			$control2 = 1;
			?>
				<div class="col-lg-3 col-sm-6  col-xs-12 col-md-3 item" id="item">
				<div class="item">
					<img src="../admin/productos/imagenes/<?php if (empty($row['foto'])){echo "upload/noimage.jpg";}else{echo $row['foto'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="margin-left:17px; margin-right:17px;">
					<div style="height:40px;  margin-left:17px;"><?php echo $row['nombre']; ?><div class="pull-right" style="height:40px;  margin-left:17px;">disponible: <?php echo $row['existencia']; ?></div></div>
					</div>
					<div style="height: 10px;"></div>
					
					<div style="margin-left:17px; margin-right:17px;">
					<?php if($row['indicador'] == 0){
						
						?>
						<button type="button" class="btn btn-info btn-sm addcart" onclick="activar(<?php echo $row['idProducto']; ?>)"><i class="fa fa-eye fa-fw" ></i>Activar</button> <span class="pull-right"><strong><?php echo number_format($row['precioVenta'],2); ?></strong></span> 
					<?php
					}else {
						
						?>
						<button type="button" class="btn btn-danger btn-sm addcart" onclick="desactivar(<?php echo $row['idProducto']; ?>)"><i class="fa fa-eye-slash fa-fw" ></i> Desactivar</button> <span class="pull-right"><strong><?php echo number_format($row['precioVenta'],2); ?></strong></span> 
						<?php
					}
					?>
						
					</div>
				</div>
				</div>
			
					
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
	?>
</div>

<script type="text/javascript">

</script>