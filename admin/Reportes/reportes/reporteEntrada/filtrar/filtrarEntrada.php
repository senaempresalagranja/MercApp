<?php 


include '../../../clases/conexion.php';
$obj= new conectar();
$conexion = $obj->conexion();
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
  


$sql="SELECT tblote.codigoLote, tblote.responsableProduccion, tbentrada.fecha, tblote.fechaProduccion, tbproducto.nombre, 
tbloteproducto.cantidad, tbloteproducto.fechaVencimiento, tbloteproducto.valorUnitario, tbunidad.nombre, 
tbentrada.idEntrada, tbentrada.responsableRcibir, tbentrada.horaEntrada, tbentrada.cantidadEntrar, 
tbentrada.valorTotal, tbloteproducto.idLote, tbloteproducto.idLoteProducto FROM tbentrada INNER JOIN tbloteproducto 
ON tbloteproducto.idLoteProducto=tbentrada.idLoteProducto INNER JOIN tbproducto ON 
tbproducto.idProducto=tbloteproducto.idProducto INNER JOIN tblote ON tblote.idLote=tbloteproducto.idLote 
INNER JOIN tbunidad ON tbunidad.idUnidad=tbproducto.idUnidad where tbentrada.fecha BETWEEN '$fecha1' and '$fecha2'";
    
$resource=mysqli_query($conexion,$sql);

?>
<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>

					
				
 				<td>
 					Codigo Lote
 				</td>

 				<td>	
 					Responsanble produccion
 				</td>

				 <td>
 					Fecha Entrada
 				</td>

 				<td>
 					Fecha produccion 
 				</td>

 				<td>
 					Nombre Producto
 				</td>

 				<td>
 					Cantidad llegada
 				</td>

 				<td>
 					Fecha vencimiento 
 				</td>


 				<td>
 					Valor unitario
 				</td>

				 <td>
 					Unidad
 				</td>

				
 				<td>
 					Entrada
 				</td>

 				<td>
 					Responsable recibir 
 				</td>


 				<td>
 					Hora entrada
 				</td>

 				<td>
 					Cantidad entrada
 				</td>

 				<td>
 					Valor total
 				</td>

 				<td>
 					Lote 
 				</td>

 				<td>
 					Lote producto
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

	
	 
	