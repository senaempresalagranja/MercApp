
<?php 

require_once "clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT idPromocion, fechaInicio, fechaFin, nombre, valorActual, valorPromocion, cantidad, img FROM tbpromocion  INNER  JOIN tbproducto ON tbproducto.idProducto=tbpromocion.idProducto";


$result=mysqli_query($conexion,$sql);
?>


<div>
	<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>

				
 				<td>
 					Id Promocion
 				</td>

 				<td>
 					Fecha inicio
 				</td>
 				<td>
 					Fecha fin
 				</td>
 				<td>
 					
 					Nombre producto
 				</td>

 				<td>
 					Valor actual
 				</td>
 				<td>
 					Valor promocion
 				</td>
 				<td>
 					Cantidad
 				</td>
 			
				 <td>
 					Foto
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
				
					<td><?php echo '<img src="productos/imagenes/'.$mostrar[7].'" width="100px" height="100px></img> "' ?></td>
					
					
			
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ActualizarPromocion" onclick="agregaFrmActualizarPromocion('<?php echo $mostrar[0] ?>')">
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