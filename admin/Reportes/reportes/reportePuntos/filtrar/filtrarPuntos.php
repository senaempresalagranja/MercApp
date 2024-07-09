<?php 


include '../../../clases/conexion.php';
$obj= new conectar();
$conexion = $obj->conexion();
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
  


$sql="SELECT tbtraslado.idTraslado, tbtraslado.fecha, tbunidad.nombre, tbtraslado.causa, tbtraslado.referencia, tbtraslado.responsableRecepcion, tbproducto.nombre, tbtrasladoproducto.cantidad, tbtrasladoproducto.descripcionCausa, tbtrasladoproducto.idTranslado FROM tbtrasladoproducto INNER JOIN tbtraslado ON tbtraslado.idTraslado=tbtrasladoproducto.idTranslado INNER JOIN tbproducto ON tbproducto.idProducto=tbtrasladoproducto.idProducto INNER JOIN tbunidad ON tbunidad.idUnidad=tbtraslado.idUnidad";
$resource=mysqli_query($conexion,$sql);

?>
<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>

				
 				<td>
 					Id Traslado
 				</td>

 				<td>
 					Fecha
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

 				
 				<td>
 					
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
		<td class='col-xs-3'><?php echo $fila[7] ?></td>
		<td class='col-xs-3'><?php echo $fila[8] ?></td>
		<td class='col-xs-3'><?php echo $fila[9] ?></td>
		<td class='col-xs-3'><?php echo $fila[10] ?></td>
		<td class='col-xs-3'><?php echo $fila[11] ?></td>
		<td class='col-xs-3'><?php echo $fila[12] ?></td>
		<td class='col-xs-3'><?php echo $fila[13] ?></td>
		<td class='col-xs-3'><?php echo $fila[14] ?></td>
		<td class='col-xs-3'><?php echo $fila[15] ?></td>

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

	
	 
	