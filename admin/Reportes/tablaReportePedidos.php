<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT  idPedido, valorPedidoRealizado, fechaPedido, tbcliente.nombre , tbcliente.telefono , tbcliente.tipoCliente ,
 `horaEntregaPedido` , indicador, tbcliente.idCliente   FROM `tbpedido` INNER JOIN tbcliente on 
 tbcliente.idCliente = tbpedido.idCliente WHERE `indicador` =  '1' OR `indicador` = '2'";



 $result=mysqli_query($conexion,$sql);
?>

<div>
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
			while ($mostrarm=mysqli_fetch_row($result)) {	
			?>			
				<tr>
					<td><?php echo $mostrarm[0] ?></td>
					<td><?php echo $mostrarm[1] ?></td>
					<td><?php echo $mostrarm[2] ?></td>
					<td><?php echo $mostrarm[3] ?></td>
					<td><?php echo $mostrarm[4] ?></td>
					<td><?php echo $mostrarm[5] ?></td>
					<td><?php echo $mostrarm[6] ?></td>											
					
				</tr>
			<?php
		}

			?>

		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#iddatatable').DataTable();
	});
</script>
