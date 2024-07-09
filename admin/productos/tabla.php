
<?php

require_once "clases/conexion.php";
$obj      = new conectar();
$conexion = $obj->conexion();

$sql    = "SELECT tbproducto.idProducto, tbproducto.codigoBarras, tbproducto.nombre, tbunidadmedida.unidadMedida, tbcategoria.Nombre, tbunidad.nombre, tbproducto.presentacion, tbproducto.precioVenta, tbproducto.existencia, tbproducto.foto, tbproducto.elemento FROM tbproducto INNER JOIN tbcategoria ON tbcategoria.idCategoria=tbproducto.idCategoria INNER JOIN tbunidad ON tbunidad.idUnidad=tbproducto.idUnidad INNER JOIN tbunidadmedida ON tbunidadmedida.idUnidadmedida = tbproducto.idUnidadMedida";
$result = mysqli_query($conexion, $sql);
?>


<div>
	<table border="1" align="center" class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #fd7e14;color: white; font-weight: bold; ">
			<tr>
				<td>
 					id
 				</td>

 				<td>
 					Codigo de barras
 				</td>

 				<td>
 					Nombre Producto
 				</td>

 				<td>
 					Unidad de medida
 				</td>

 				<td>
 					Categoria
 				</td>

 				<td>
 					Unidad Proveniente
 				</td>
 				<td>
 					Presentacion del producto
 				</td>


 				<td>
 					Precio Venta
 				</td>

 				<td>
 					Existencia
 				</td>
 				<td>
 					Foto
 				</td>
 				<td>
 					Composicion
 				</td>
 				<td>

 				</td>
			</tr>
		</thead>

		<tbody >
			<?php
while ($mostrar = mysqli_fetch_row($result)) {

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
					<td><?php echo '<img src="productos/imagenes/'.$mostrar[9].'" width="100px" height="100px></img> "' ?></td>
					<td><?php echo $mostrar[10] ?></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#actualizarProducto" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span class="fa fa-pencil-square-o"></span>
						</span>
					</td>

					</td>
				</tr>
			<?php }?>

		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#iddatatable').DataTable();
	});
</script>
<script type="text/javascript">$('#iddatatable').DataTable( {
    language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ Registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 Registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ Registros)",
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