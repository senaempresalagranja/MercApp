<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT tblote.codigoLote, tblote.responsableProduccion, tblote.fechaProduccion, tbproducto.nombre, tbloteproducto.cantidad, tbloteproducto.fechaVencimiento, tbloteproducto.valorUnitario, tbentrada.idEntrada, tbentrada.fecha, tbentrada.responsableRcibir, tbentrada.horaEntrada, tbentrada.cantidadEntrar, tbentrada.valorTotal, tbloteproducto.idLote, tbloteproducto.idLoteProducto FROM tbentrada INNER JOIN tbloteproducto ON tbloteproducto.idLoteProducto=tbentrada.idLoteProducto INNER JOIN tbproducto ON tbproducto.idProducto=tbloteproducto.idProducto INNER JOIN tblote ON tblote.idLote=tbloteproducto.idLote
";



 $result=mysqli_query($conexion,$sql);
?>

<div>
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
 					Fecha produccion 
 				</td>

 				<td>
 					Nombre 
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
 					Entrada
 				</td>

 				<td>
 					Fecha 
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
 			
 				<td>
 					
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
					<td><?php echo $mostrarm[10] ?></td>
					<td><?php echo $mostrarm[11] ?></td>
					<td><?php echo $mostrarm[12] ?></td>
					<td><?php echo $mostrarm[13] ?></td>
					<td><?php echo $mostrarm[14] ?></td>
				
					
					
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#actualizarEntrada" onclick="agregaFrmActualizarEntra('<?php echo $mostrarm[7] ?>')"> 
							<span class="fa fa-pencil-square-o"></span>
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
		$('#iddatatable').DataTable().fnDestroy();
	} );
</script>
<script type="text/javascript">$('#iddatatable').DataTable( {
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
   
    }
} ).fnDestroy();

    </script>