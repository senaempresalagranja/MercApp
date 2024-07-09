
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT  idPedido, valorPedidoRealizado, fechaPedido, tbcliente.nombre , tbcliente.telefono , tbcliente.tipoCliente , `horaEntregaPedido` , indicador, tbcliente.Cliente   FROM `tbpedido` INNER JOIN tbcliente on tbcliente.Cliente = tbpedido.idCliente WHERE `indicador` =  '1' OR `indicador` = '2'";
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
				<td>Hora de Entrega</td>
				<td>Valor del Pedido</td>
				<td>Confirmar</td>
				<td>Despachar</td>
				<td>Detalle </td>
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
					<td><?php echo $mostrar[6] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<?php 
					if($mostrar[7]==2 ){
						echo "
						<td style='text-align: center;'>
						<span class='btn btn-warning btn-sm disabled'>
							<span class='fa fa-check-circle'></span>
						</span>
					</td>
						";
					}else {
						echo"<td style='text-align: center;'>
						<span class='btn btn-warning btn-sm' onclick='confirmar($mostrar[0])'>
							<span class='fa fa-check-circle'></span>
						</span>
					</td>";
					}
					?>
					
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="despachar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-share"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-info btn-sm"  onclick="detalle('<?php echo $mostrar[0] ?>')" data-toggle="modal" data-target="#detalle">
						
							<span class="<i fa fa-archive"></span>
						</span>
					</td>
				</tr>
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