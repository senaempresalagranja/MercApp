<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT tbtraslado.idTraslado, tbtraslado.fecha, tbunidad.nombre, tbtraslado.causa, tbtraslado.referencia, 
tbtraslado.responsableRecepcion, tbproducto.nombre, tbtrasladoproducto.cantidad, tbtrasladoproducto.descripcionCausa, 
tbtrasladoproducto.idTranslado FROM tbtrasladoproducto INNER JOIN tbtraslado ON tbtraslado.idTraslado=tbtrasladoproducto.idTranslado 
INNER JOIN tbproducto ON tbproducto.idProducto=tbtrasladoproducto.idProducto INNER JOIN tbunidad ON 
tbunidad.idUnidad=tbtraslado.idUnidad";



 $result=mysqli_query($conexion,$sql);
?>

<div>
	<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>

				
			<td>
 					Id Traslado
 				</td>

 				<td>
 					Fecha Traslado
 				</td>

 				<td>
 					Nombre Producto
 				</td>

 				<td>
 					Unidad destino
 				</td>

 				<td>
 					Causa
 				</td>

 				<td>
 					Referencia
 				</td>

 				<td>
 					Responsable recepcion
 				</td>

 				<td>
 					Cantidad
 				</td>
 				<td>
 					Descripcion causa
 				</td>

 				<td>
 					Id Traslado producto
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
					<td><?php echo $mostrarm[7] ?></td>
					<td><?php echo $mostrarm[8] ?></td>
					<td><?php echo $mostrarm[9] ?></td>
					
			
				
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
