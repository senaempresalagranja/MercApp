<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php require_once "scripts.php";?>
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
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Unidad
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarUnidad">
							Agregar Unidad <span class="fa fa-plus-circle"></span>
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
	<div class="modal fade" id="agregarUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega un nueva Unidad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					
					<form id="addUnidad" method="POST">
 
<?php

$conexion     = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$Area     = mysqli_query($conexion, "SELECT idArea, nombre FROM tbarea") or die("problemas del select" . mysqli_error($conexion));
?>

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Escribe la descripcion causa de la devolucion" >

                   <label for="idArea">Area</label>
                   <select class="form-control" id="idArea" name="idArea" onchange="return validar_idArea()">
                    <option></option>
                    <?php 
                    while ($area = mysqli_fetch_array($Area)) { 
                     ?>
                     <option value="<?php echo ($area['idArea']) ?>"><?php echo ($area['nombre']) ?></option>
                     <?php } ?>
                     </select>
                        </form>
					
				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarUnidad()" id="btnAgregarnuevaUnidad" class="btn btn-primary">Agregar</button>

             
				</div>
				
				
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="ActualizarUnidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Area </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					<form id="acUnidad" method="POST">
            <?php

$conexion     = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$Area     = mysqli_query($conexion, "SELECT idArea, nombre FROM tbarea") or die("problemas del select" . mysqli_error($conexion));
?>

						<label for="idUnidad">Codigo area</label>
                   <input class="form-control" name="idUnidadU" id="idUnidadU" type="number" placeholder="Escribe nombre del responsable de recepcion" readonly>

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombreU" id="nombreU" type="text" placeholder="Escribe la descripcion causa de la devolucion">

                   <label for="idArea">Area</label>
                   <select class="form-control" id="idAreaU" name="idAreaU" onchange="return validar_idAreau()">
                    <option></option>
                    <?php 
                    while ($area = mysqli_fetch_array($Area)) { 
                     ?>
                     <option value="<?php echo ($area['idArea']) ?>"><?php echo ($area['nombre']) ?></option>
                     <?php } ?>
                     </select>
				      </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" onclick="validarActuUnidad()" id="btnActualizarUnidad" class="btn btn-primary">Actualizar</button>

			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('productos/tablaUnidad.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaUnidad').click(function() {
          if (validarUnidad() == true) {
            datos=$('#addUnidad').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceUnidad/agregarUnidad.php",
               success:function(r) {
                    if (r==1) {
                        $('#addUnidad')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaUnidad.php');
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


		$('#btnActualizarUnidad').click(function() {
      if (validarActuUnidad() == true) {
        datos=$('#acUnidad').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceUnidad/actualizarUnidad.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaUnidad.php');
                    alertify.success("Actualizado con exito :D");
                } else {
                    alertify.error("Fallo al actualizar :(");
                }
                }
            });
      }else{
              alertify.error("Los campos no deben quedar vacios");
          }
        });
      
</script>
<script type="text/javascript">
    function agregaFrmActualizarUnidad(idUnidad) {
        $.ajax({
            type:"POST",
            data:"idUnidad=" + idUnidad,
            url:"productos/proceUnidad/obtenUnidad.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idUnidadU').val(datos['idUnidad']);
                $('#nombreU').val(datos['nombre']);
               $('#idAreaU').val(datos['idArea']);
            }
        });
    }

  </script>
  <script>
function validarUnidad(){

var nombre= document.getElementById("nombre").value;
var idArea= document.getElementById("idArea").value;


if ((nombre == "") || (idArea == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#nombre").keyup(validar_nombre)
    $("#idArea").keyup(validar_idArea)
     
}


  function validar_nombre() {
    var nombre= document.getElementById("nombre").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("nombre").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("nombre").style.border = "2px solid #4caf50";
        return true;
    }
}
function validar_idArea() {
    var idArea= document.getElementById("idArea").value;

    if (idArea == null || idArea == 0) {
        var idArea = document.getElementById("idArea").style.border = "2px solid red";
        return false;
    } else {
        var idArea = document.getElementById("idArea").style.border = "2px solid #4caf50";
        return true;
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////

function validarActuUnidad(){

var idUnidad= document.getElementById("idUnidadU").value; 
var nombre= document.getElementById("nombreU").value;
var idArea= document.getElementById("idAreaU").value;


if ((idUnidad == "") || (nombre == "")|| (idArea == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocionu);

    function promocionu(){
    $("#idUnidadU").keyup(validar_idUnidad)
    $("#nombreU").keyup(validar_nombreu)
     $("#idAreaU").keyup(validar_idAreau)
}

  function validar_idUnidad() {
    var idUnidad= document.getElementById("idUnidadU").value;

    if (idUnidad == null || idUnidad.length == 0 || /^\s+$/.test(idUnidad)) {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_nombreu() {
    var nombre= document.getElementById("nombreU").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("nombreU").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("nombreU").style.border = "2px solid #4caf50";
        return true;
    }
}
function validar_idAreau() {
    var idArea= document.getElementById("idAreaU").value;

    if (idArea == null || idArea == 0) {
        var idArea = document.getElementById("idAreaU").style.border = "2px solid red";
        return false;
    } else {
        var idArea = document.getElementById("idAreaU").style.border = "2px solid #4caf50";
        return true;
    }
}

</script>


	

