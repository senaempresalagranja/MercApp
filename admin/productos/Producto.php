<!DOCTYPE html>
<html>
<head>

	<title></title>

	 <script>
     $(document).ready( function () {
      $("input").on("keypress", function () {
       $input=$(this);
       setTimeout(function () {
        $input.val($input.val().toUpperCase());
       },50);
      })
     })
    </script>
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>


	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Productos
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarProducto">
							Agregar Producto <span class="fa fa-plus-circle"></span>
						</span>


						<hr>

						<div class="table-responsive">
						<div id="tablaDatatable"></div>
						</div>
					</div>
					<center><div class="card-footer text-muted">
						MercApp - TecNova
					</div></center>
				</div>
			</div>
		</div>
	</div>


<!-- Modal -->
	<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega un nuevo producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<form id="addProducto"  >

<?php

$conexion     = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$producto     = mysqli_query($conexion, "SELECT idProducto FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));

$unidad       = mysqli_query($conexion, "SELECT idUnidad, nombre FROM tbunidad") or die("problemas del select" . mysqli_error($conexion));

$medida       = mysqli_query($conexion, "SELECT idUnidadMedida, unidadMedida FROM tbunidadmedida") or die("problemas del select" . mysqli_error($conexion));

$categoria    = mysqli_query($conexion, "SELECT idCategoria, nombre FROM tbcategoria") or die("problemas del select" . mysqli_error($conexion));
// mysql_select_db(foto) or die("problemas del select" . mysqli_error($conexion));

$pro = mysqli_fetch_array($producto);
?>
					<label for="idProducto">codigo Producto</label>
                    <input style="border: " type="number" class="form-control" id="idProducto" name="idProducto" type="text">

                    <label for="codigoBarras">Codigo de Barras</label>
                    <input class="form-control" type="number" id="codigoBarras" name="codigoBarras" type="text" placeholder="Escribe el Codigo de Barras">
                     <label for="nombre">Nombre</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Escribe el Nombre">

                    <label for="idUnidadMedida">Unidad de Medida</label>
                    	<select class="form-control" id="idUnidadMedida" name="idUnidadMedida" onchange="return validar_UnidadMedida()">
                    		<option></option>
                    	 <?php
						while ($med = mysqli_fetch_array($medida)) {
    					?>
                      <option  value="<?php echo ($med['idUnidadMedida']) ?>"> <?php echo ($med['unidadMedida']) ?></option>
                    <?php }?>
                    </select>
                      

                    <label for="idCategoria">Categoria</label>
                    <select class="form-control" id="idCategoria" name="idCategoria" onchange="return validar_idCategoria()">
                    	<option></option>
                        <?php
						while ($cat = mysqli_fetch_array($categoria)) {
    					?>
                      <option  value="<?php echo ($cat['idCategoria']) ?>"> <?php echo ($cat['nombre']) ?></option>
                    <?php }?>
                    </select>

                    <label for="idUnidad">Unidad Proveniente </label>

                    <select class="form-control" id="idUnidad" name="idUnidad" onchange="return validar_idUnidad()">
                    	<option></option>
                       <?php
						while ($uni = mysqli_fetch_array($unidad)) {

   						 ?>
                      <option value="<?php echo ($uni['idUnidad']) ?>"><?php echo $uni['nombre'] ?></option>
                       <?php }?>
                    </select>

                    <label for="presentacion">Presentacion </label>
                    <input class="form-control" id="presentacion" name="presentacion" type="text" placeholder="Escribe el Presentacion del producto">
                    
                    <label for="precioVenta">Precio Venta</label>
                    <input class="form-control" type="number" id="precioVenta" name="precioVenta" type="text" placeholder="Escribe el Precio de Venta">

                    <label for="existencia">Existencia</label>
                    <input class="form-control" id="existencia" name="existencia" type="text" placeholder="Escribe la existencia">


                   
                    <label> Foto del Producto</label>
                    <input type="file"  id="foto" name="foto"> 
                    
                    <br>


                     <label for="composición">Composición</label>
                    <input class="form-control" id="elemento" name="elemento" type="text" placeholder="Escribe la composicion del producto">
                        </form>
             				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarProducto()" id="btnAgregarnuevo" class="btn btn-primary">Agregar</button>


				</div>


			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="actualizarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar  producto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					<form id="ActualizarProducto">
			<?php

$conexion     = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$producto     = mysqli_query($conexion, "SELECT idProducto FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));

$unidad       = mysqli_query($conexion, "SELECT idUnidad, nombre FROM tbunidad") or die("problemas del select" . mysqli_error($conexion));

$medida       = mysqli_query($conexion, "SELECT idUnidadMedida, unidadMedida FROM tbunidadmedida") or die("problemas del select" . mysqli_error($conexion));

$categoria    = mysqli_query($conexion, "SELECT idCategoria, nombre FROM tbcategoria") or die("problemas del select" . mysqli_error($conexion));
// mysql_select_db(foto) or die("problemas del select" . mysqli_error($conexion));

$pro = mysqli_fetch_array($producto);
?>

					<label  for="idProductoU" >idProducto</label>
                    <input style="border: "  class="form-control" id="idProductoU" name="idProductoU" type="text" value="">
                


                    <label for="codigoBarrasU">Codigo de Barras</label>
                    <input class="form-control" id="codigoBarrasU" name="codigoBarrasU" type="text" placeholder="Escribe el Codigo de Barras">
                     <label for="nombreU">Nombre</label>
                    <input class="form-control" id="nombreU" name="nombreU" type="text" placeholder="Escribe el Nombre">
    				 
                     <label for="idUnidadMedida">Unidad de Medida</label>
                    	<select class="form-control" id="idUnidadMedidaU" name="idUnidadMedidaU" onchange="return validar_UnidadMedida()">
                    		<option></option>
                    	 <?php
						while ($med = mysqli_fetch_array($medida)) {
    					?>
                      <option  value="<?php echo ($med['idUnidadMedida']) ?>"> <?php echo ($med['unidadMedida']) ?></option>
                    <?php }?>
                    </select>

                 
      				

                   <label for="idCategoria">Categoria</label>
                    <select class="form-control" id="idCategoriaU" name="idCategoriaU">
                    	<option></option>
                        <?php
						while ($cat = mysqli_fetch_array($categoria)) {
    					?>
                      <option  value="<?php echo ($cat['idCategoria']) ?>"> <?php echo ($cat['nombre']) ?></option>
                    <?php }?>
                    </select>

                    <label for="idUnidad">Unidad Proveniente </label>

                    <select class="form-control" id="idUnidadU" name="idUnidadU">
                    	<option></option>
                       <?php
						while ($uni = mysqli_fetch_array($unidad)) {

   						 ?>
                      <option value="<?php echo ($uni['idUnidad']) ?>"><?php echo $uni['nombre'] ?></option>
                       <?php }?>
                    </select>

                    </select>
                    <label for="presentacion">Presentacion del Producto</label>
                    <input class="form-control" id="presentacionU" name="presentacionU" type="text" placeholder="Escribe el Precio de Venta">

                    <label for="precioVenta">Precio Venta</label>
                    <input class="form-control" id="precioVentaU" name="precioVentaU" type="text" placeholder="Escribe el Precio de Venta">




                    <label for="existencia">Existencia</label>
                    <input class="form-control" id="existenciaU" name="existenciaU" type="text" placeholder="Escribe la existencia">
                    
                    <label> Foto del Producto</label>
                      <input type="file" id="fotoU" name="fotoU" >
                      <br>

                        <label for="elemento">Composición</label>
                    <input class="form-control" id="elementoU" name="elementoU" type="text" placeholder="Escribe el  Elemento">

                    <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnActualizarProducto" class="btn btn-primary">Actualizar</button>
				</div>

				      </form>
				</div>

		</div>
	</div>






</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('productos/tabla.php');
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			if (validarProducto() == true) {
			
			var datos = new FormData($("#addProducto")[0])
			// datos=$('#addProducto').submit(addProducto);
			
			// frmData.append("foto", $('imput [name = foto]')[0])
			

			$.ajax({
				type:"POST",
				data: datos,
				contentType: false,
				processData: false,
				url:"productos/procesos/agregar.php",
				success:function(r) {
					if (r==1) {
						$('#addProducto')[0].reset();
						$('#tablaDatatable').load('productos/tabla.php');
						alertify.success("agregado con exito");
					}else{
						alertify.error("Fallo al agregar");
					}

		}
	});

		}else{
			alertify.error("Los campos no pueden quedar vacios");
		}
});
	});



		$('#btnActualizarProducto').click(function(){
			if (validaractuProducto() ==true) {

			var datos = new FormData($("#ActualizarProducto")[0])

		$.ajax({
				type:"POST",
				data: datos,
				contentType: false,
				processData: false,
				url:"productos/procesos/actualizar.php",
				success:function(r) {
					if (r==1) {
						$('#ActualizarProducto')[0].reset();
						$('#tablaDatatable').load('productos/tabla.php');
						alertify.success("agregado con exito");
					}else{
						alertify.error("Fallo al agregar");
					}
				}
			});
	} else {
		alertify.error("Los campos no pueden quedar vacios");
	}
		});


</script>
<script type="text/javascript">
	function agregaFrmActualizar(idProducto){
		$.ajax({
			type:"POST",
			data:"idProducto=" + idProducto,
			url:"productos/procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idProductoU').val(datos['idProducto']);
				$('#codigoBarrasU').val(datos['codigoBarras']);
				$('#nombreU').val(datos['nombre']);
				$('#idUnidadMedidaU').val(datos['idUnidadMedida']);
				$('#idCategoriaU').val(datos['idCategoria']);
				$('#idUnidadU').val(datos['idUnidad']);
				$('#presentacionU').val(datos['presentacion']);
				$('#precioVentaU').val(datos['precioVenta']);
				$('#existenciaU').val(datos['existencia']);
				$('#fotoU').val(datos['foto']);
				$('#elementoU ').val(datos['elemento']);
			}
		});
	}
</script>
<script>
	function validarProducto(){

var idProducto= document.getElementById("idProducto").value;
var codigoBarras= document.getElementById("codigoBarras").value;
var nombre= document.getElementById("nombre").value;
 var unidadMedida= document.getElementById("idUnidadMedida").value;
 var idCategoria= document.getElementById("idCategoria").value;
var idUnidad= document.getElementById("idUnidad").value;
var presentacion= document.getElementById("presentacion").value;
var precioVenta= document.getElementById("precioVenta").value;
var existencia = document.getElementById("existencia").value;
var elemento= document.getElementById("elemento").value;




if ((idProducto == "") || (codigoBarras == "") || (nombre == "") || (unidadMedida == "") || (idCategoria == "")|| (idUnidad == "")|| (presentacion == "")|| (precioVenta == "")|| (existencia == "")|| (elemento == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}

$(document).ready(inicio);

function inicio(){
	$("#idProducto").keyup(validar_idProducto)
	$("#codigoBarras").keyup(validar_codigoBarras)
	$("#nombre").keyup(validar_nombre)
	$("#idUnidadMedida").keyup(validar_UnidadMedida)
	$("#idCategoria").keyup(validar_idCategoria)
	$("#idUnidad").keyup(validar_idUnidad)
	$("#presentacion").keyup(validar_Presentacion)
	$("#precioVenta").keyup(validar_precioVenta)
	$("#existencia").keyup(validar_existencia)
	$("#elemento").keyup(validar_elemento)
}
function validar_idProducto() {
    var idProducto= document.getElementById("idProducto").value;

    if (idProducto == null || idProducto.length == 0 || /^\s+$/.test(idProducto)) {
        var idProducto = document.getElementById("idProducto").style.border = "2px solid red";
        return false;
    } else {
        var idProducto = document.getElementById("idProducto").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_codigoBarras(){
	var codigoBarras= document.getElementById("codigoBarras").value;
	if (codigoBarras == null || codigoBarras == 0) {
		var codigoBarras = document.getElementById("codigoBarras").style.border = "2px solid red";
		return false;
	} else {
		var codigoBarras = document.getElementById("codigoBarras").style.border = "2px solid #4caf50";
		return true;
	}
}

function validar_nombre(){
	var nombre= document.getElementById("nombre").value;
	if (nombre == null || nombre == 0) {
		var nombre = document.getElementById("nombre").style.border = "2px solid red";
		return false;
	} else {
		var nombre = document.getElementById("nombre").style.border = "2px solid #4caf50";
		return true;
	}
}

function validar_UnidadMedida() {
    var unidadMedida= document.getElementById("idUnidadMedida").value;

    if (unidadMedida == null || unidadMedida == 0) {
        var unidadMedida = document.getElementById("idUnidadMedida").style.border = "2px solid red";
        return false;
    } else {
        var unidadMedida = document.getElementById("idUnidadMedida").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_idCategoria() {
    var idCategoria= document.getElementById("idCategoria").value;

    if (idCategoria == null || idCategoria == 0) {
        var idCategoria = document.getElementById("idCategoria").style.border = "2px solid red";
        return false;
    } else {
        var idCategoria = document.getElementById("idCategoria").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_idUnidad() {
    var idUnidad= document.getElementById("idUnidad").value;

    if (idUnidad == null || idUnidad == 0) {
        var idUnidad = document.getElementById("idUnidad").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidad").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_Presentacion() {
    var presentacion= document.getElementById("presentacion").value;

    if (presentacion == null || presentacion == 0) {
        var presentacion = document.getElementById("presentacion").style.border = "2px solid red";
        return false;
    } else {
        var presentacion = document.getElementById("presentacion").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_precioVenta() {
    var precioVenta= document.getElementById("precioVenta").value;

    if (precioVenta == null || precioVenta == 0) {
        var precioVenta = document.getElementById("precioVenta").style.border = "2px solid red";
        return false;
    } else {
        var precioVenta = document.getElementById("precioVenta").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_existencia() {
  var existencia = document.getElementById("existencia").value;

   var existencia = this.value;
  this.value = existencia.replace(/\D|\-/,'');


if ( isNaN(existencia) ) {
    var existencia = document.getElementById("existencia").style.border = "2px solid red";
            
         return false;
      } else {
      
         
var existencia = document.getElementById("existencia").style.border = "2px solid #4caf50";
      return true;
   }
}

function validar_elemento() {
    var elemento= document.getElementById("elemento").value;

    if (elemento == null || elemento == 0) {
        var elemento = document.getElementById("elemento").style.border = "2px solid red";
        return false;
    } else {
        var elemento = document.getElementById("elemento").style.border = "2px solid #4caf50";
        return true;
    }
}

</script>

<script>
	////////////////////////////////////////////////////////////////////////////////////////
	function validaractuProducto(){

var idProducto= document.getElementById("idProductoU").value;
var codigoBarras= document.getElementById("codigoBarrasU").value;
var nombre= document.getElementById("nombreU").value;
 var unidadMedida= document.getElementById("idUnidadMedidaU").value;
 var idCategoria= document.getElementById("idCategoriaU").value;
var idUnidad= document.getElementById("idUnidadU").value;
var presentacion= document.getElementById("presentacionU").value;
var precioVenta= document.getElementById("precioVentaU").value;
var existencia = document.getElementById("existenciaU").value;
var elemento= document.getElementById("elementoU").value;




if ((idProducto == "") || (codigoBarras == "") || (nombre == "") || (unidadMedida == "") || (idCategoria == "")|| (idUnidad == "")|| (presentacion == "")|| (precioVenta == "")|| (existencia == "")|| (elemento == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}

$(document).ready(inicio);

function inicio(){
	$("#idProductoU").keyup(validar_idProductoU)
	$("#codigoBarrasU").keyup(validar_codigoBarrasU)
	$("#nombreU").keyup(validar_nombreU)
	$("#idUnidadMedidaU").keyup(validar_UnidadMedidaU)
	$("#idCategoriaU").keyup(validar_idCategoriaU)
	$("#idUnidadU").keyup(validar_idUnidadU)
	$("#presentacionU").keyup(validar_PresentacionU)
	$("#precioVentaU").keyup(validar_precioVentaU)
	$("#existenciaU").keyup(validar_existenciaU)
	$("#elementoU").keyup(validar_elementoU)
}
function validar_idProductoU() {
    var idProducto= document.getElementById("idProductoU").value;

    if (idProducto == null || idProducto.length == 0 || /^\s+$/.test(idProducto)) {
        var idProducto = document.getElementById("idProductoU").style.border = "2px solid red";
        return false;
    } else {
        var idProducto = document.getElementById("idProductoU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_codigoBarrasU(){
	var codigoBarras= document.getElementById("codigoBarrasU").value;
	if (codigoBarras == null || codigoBarras == 0) {
		var codigoBarras = document.getElementById("codigoBarrasU").style.border = "2px solid red";
		return false;
	} else {
		var codigoBarras = document.getElementById("codigoBarrasU").style.border = "2px solid #4caf50";
		return true;
	}
}

function validar_nombreU(){
	var nombre= document.getElementById("nombreU").value;
	if (nombre == null || nombre == 0) {
		var nombre = document.getElementById("nombreU").style.border = "2px solid red";
		return false;
	} else {
		var nombre = document.getElementById("nombreU").style.border = "2px solid #4caf50";
		return true;
	}
}

function validar_UnidadMedidaU() {
    var unidadMedida= document.getElementById("idUnidadMedidaU").value;

    if (unidadMedida == null || unidadMedida == 0) {
        var unidadMedida = document.getElementById("idUnidadMedidaU").style.border = "2px solid red";
        return false;
    } else {
        var unidadMedida = document.getElementById("idUnidadMedidaU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_idCategoriaU() {
    var idCategoria= document.getElementById("idCategoriaU").value;

    if (idCategoria == null || idCategoria == 0) {
        var idCategoria = document.getElementById("idCategoriaU").style.border = "2px solid red";
        return false;
    } else {
        var idCategoria = document.getElementById("idCategoriaU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_idUnidadU() {
    var idUnidad= document.getElementById("idUnidadU").value;

    if (idUnidad == null || idUnidad == 0) {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_PresentacionU() {
    var presentacion= document.getElementById("presentacionU").value;

    if (presentacion == null || presentacion == 0) {
        var presentacion = document.getElementById("presentacionU").style.border = "2px solid red";
        return false;
    } else {
        var presentacion = document.getElementById("presentacionU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_precioVentaU() {
    var precioVenta= document.getElementById("precioVentaU").value;

    if (precioVenta == null || precioVenta == 0) {
        var precioVenta = document.getElementById("precioVentaU").style.border = "2px solid red";
        return false;
    } else {
        var precioVenta = document.getElementById("precioVentaU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_existenciaU() {
  var existencia = document.getElementById("existenciaU").value;

   var existencia = this.value;
  this.value = existencia.replace(/\D|\-/,'');


if ( isNaN(existencia) ) {
    var existencia = document.getElementById("existenciaU").style.border = "2px solid red";
            
         return false;
      } else {
      
         
var existencia = document.getElementById("existenciaU").style.border = "2px solid #4caf50";
      return true;
   }
}

function validar_elementoU() {
    var elemento= document.getElementById("elementoU").value;

    if (elemento == null || elemento == 0) {
        var elemento = document.getElementById("elementoU").style.border = "2px solid red";
        return false;
    } else {
        var elemento = document.getElementById("elementoU").style.border = "2px solid #4caf50";
        return true;
    }
}

</script>






