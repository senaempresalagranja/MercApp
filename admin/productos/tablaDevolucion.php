
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT tbtraslado.idTraslado,tbtraslado.tipoCausa, tbtraslado.fecha, tbunidad.nombre, tbtraslado.causa, tbtraslado.referencia, tbtraslado.responsableRecepcion, tbproducto.nombre, tbtrasladoproducto.cantidad, tbtrasladoproducto.descripcionCausa FROM tbtrasladoproducto INNER JOIN tbtraslado ON tbtraslado.idTraslado=tbtrasladoproducto.idTraslado INNER JOIN tbproducto ON tbproducto.idProducto=tbtrasladoproducto.idProducto INNER JOIN tbunidad ON tbunidad.idUnidad=tbtraslado.idUnidad";


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
 					Tipo causa 
 				</td>
 				<td>
 					Fecha
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
 					Nombre producto
 				</td>


 				<td>
 					Cantidad
 				</td>
 				<td>
 					Descripcion causa
 				</td>

 				

 				
 				<td>
 					
 				</td>
			</tr>
		</thead>
	
		<body >
			<?php while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
					<td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
					<td><?php echo $mostrar[6] ?></td>
					<td><?php echo $mostrar[7] ?></td>
					<td><?php echo $mostrar[8] ?></td>					
					<td><?php echo $mostrar[9] ?></td>
				

			
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ActualizarDevolucion" onclick="agregaFrmActualizarDevolucion('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil-square-o"></span>
						</span>
					</td>
				<?php
			}
				?>
				
				</tr>
		
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
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
    }
    }
} );

    </script>