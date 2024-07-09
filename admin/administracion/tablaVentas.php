
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT  idPedido, valorPedidoRealizado, fechaPedido, tbcliente.nombre , tbcliente.telefono , tbcliente.tipoCliente , `horaEntregaPedido` , indicador, tbcliente.idCliente   FROM `tbpedido` INNER JOIN tbcliente on tbcliente.Cliente = tbpedido.idCliente WHERE `indicador` =  '3'";
$result=mysqli_query($conexion,$sql);
?>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color:#fd7e14;color: white; font-weight: bold;">
			<tr>
				<td>Pedido</td>
				<td>Nombre del Cliete</td>
				<td>Telefono</td>
				<td>Tipo</td>
				<td>Fecha del Pedido</td>
				
				<td>Valor del Pedido</td>
				
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td> 
					<td><?php echo $mostrar[2] ?></td> 
					
					<td><?php echo $mostrar[1] ?></td>
					
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>