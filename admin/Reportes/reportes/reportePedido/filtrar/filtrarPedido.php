<?php 


include '../../../clases/conexion.php';
$obj= new conectar();
$conexion = $obj->conexion();
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
  


$sql="SELECT  idPedido, valorPedidoRealizado, fechaPedido, tbcliente.nombre , tbcliente.telefono , tbcliente.tipoCliente ,
 `horaEntregaPedido` , indicador, tbcliente.idCliente   FROM `tbpedido` INNER JOIN tbcliente on 
 tbcliente.idCliente = tbpedido.idCliente WHERE `indicador` =  '1' OR `indicador` = '2'
 where fechaPedido BETWEEN '$fecha1' and '$fecha2'";
    
$resource=mysqli_query($conexion,$sql);

?>
<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>
 				<td>
 					Codigo Pedido
 				</td>

 				<td>	
 					Valor del Pedido
 				</td>

				 <td>
 					Fecha Pedido
 				</td>

 				<td>
 					nombre del Cliente
 				</td>

 				<td>
 					Telefono cliente
 				</td>

 				<td>
 					Tipo de cliente
 				</td>

 				<td>
 					Hora de Entrega del pedido	
 				</td>

 				
			</tr>
		</thead>
		<tbody >
<?php
while ($fila=mysqli_fetch_row($resource)) {
 ?>
 
	
	<tr> 
		<td class='col-xs-3'><?php echo $fila[0] ?></td>
		<td class='col-xs-3'><?php echo $fila[1] ?></td>
		<td class='col-xs-3'><?php echo $fila[2] ?></td>
		<td class='col-xs-3'><?php echo $fila[3] ?></td>
		<td class='col-xs-3'><?php echo $fila[4] ?></td>
		<td class='col-xs-3'><?php echo $fila[5] ?></td>
		<td class='col-xs-3'><?php echo $fila[6] ?></td>
		

    </tr>
	



	<?php 
}
	 ?>
	</tbody>
	</table>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#iddatatable').DataTable();
	});
	
	
</script>

	
	 
	