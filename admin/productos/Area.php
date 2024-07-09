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
						Area
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarArea">
							Agregar Area <span class="fa fa-plus-circle"></span>
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
	<div class="modal fade" id="agregarArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega un nueva Area</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					
					<form id="addArea" method="POST">
 
                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Escribe la descripcion causa de la devolucion">

                        </form>
					
				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarArea()" id="btnAgregarnuevaArea" class="btn btn-primary">Agregar</button>

             
				</div>
				
				
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="ActualizarArea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Area </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					<form id="acArea" method="POST">
						<label for="idArea">Codigo area</label>
                   <input class="form-control" name="idAreaU" id="idAreaU" type="number" placeholder="Escribe nombre del responsable de recepcion" readonly>

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombreU" id="nombreU" type="text" placeholder="Escribe la descripcion causa de la devolucion">
				      </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" onclick="validarActuArea()" id="btnActualizarArea" class="btn btn-primary">Actualizar</button>

			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('productos/tablaArea.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaArea').click(function() {
          if (validarArea() == true) {
            datos=$('#addArea').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceArea/agregarArea.php",
               success:function(r) {
                    if (r==1) {
                        $('#addArea')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaArea.php');
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


		$('#btnActualizarArea').click(function() {
      if (validarActuArea() == true) {
        datos=$('#acArea').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceArea/actualizarArea.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaArea.php');
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
    function agregaFrmActualizarArea(idArea) {
        $.ajax({
            type:"POST",
            data:"idArea=" + idArea,
            url:"productos/proceArea/obtenArea.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idAreaU').val(datos['idArea']);
                $('#nombreU').val(datos['nombre']);
              
            }
        });
    }

  </script>
  <script>
function validarArea(){

var nombre= document.getElementById("nombre").value;


if (nombre == "") {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
   
    $("#nombre").keyup(validar_nombre)
     
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

//////////////////////////////////////////////////////////////////////////////////////////////////

function validarActuArea(){

var idArea= document.getElementById("idAreaU").value; 
var nombre= document.getElementById("nombreU").value;


if ((idArea == "") || (nombre == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#idAreaU").keyup(validar_idArea)
    $("#nombreU").keyup(validar_nombre)
     
}

  function validar_idArea() {
    var idArea= document.getElementById("idAreaU").value;

    if (idArea == null || idArea.length == 0 || /^\s+$/.test(idArea)) {
        var idArea = document.getElementById("idAreaU").style.border = "2px solid red";
        return false;
    } else {
        var idArea = document.getElementById("idAreaU").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_nombre() {
    var nombre= document.getElementById("nombreU").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("nombreU").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("nombreU").style.border = "2px solid #4caf50";
        return true;
    }
}


</script>


	

