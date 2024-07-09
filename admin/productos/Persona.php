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
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Persona
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarPersona">
							Agregar Persona <span class="fa fa-plus-circle"></span>
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
	<div class="modal fade" id="agregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega una nueva Persona</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					
					<form id="addPersona" method="POST">
 

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Escribe la nombre de la persona">

                     <label for="apellido">Apellido</label>
                   <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Escribe apellido de la persona">

                    <label for="telefono">telefono</label>
                   <input class="form-control" name="telefono" id="telefono" type="number" >

                    <label for="email">Email</label>
                   <input class="form-control" name="email" id="email" type="email" >

                    <label for="ocupacion">Ocuapcion</label>
                   <input class="form-control" name="ocupacion" id="ocupacion" type="text" placeholder="Escribe la ocupacion">
					
				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarPersona()" id="btnAgregarnuevaPersona" class="btn btn-primary">Agregar</button>

            </form> 
				</div>
				
				
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="ActualizarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Persona </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					<form id="acPersona" method="POST">
               <label for="idPersona">codigo persona</label>
                   <input class="form-control" name="idPersonaU" id="idPersonaU" type="text" placeholder="Escribe la nombre de la persona">

						 <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombreU" id="nombreU" type="text" placeholder="Escribe la nombre de la persona">

                     <label for="apellido">Apellido</label>
                   <input class="form-control" name="apellidoU" id="apellidoU" type="text" placeholder="Escribe apellido de la persona">

                    <label for="telefono">telefono</label>
                   <input class="form-control" name="telefonoU" id="telefonoU" type="number" >

                    <label for="email">Email</label>
                   <input class="form-control" name="emailU" id="emailU" type="email" >

                    <label for="ocupacion">Ocuapcion</label>
                   <input class="form-control" name="ocupacionU" id="ocupacionU" type="text" placeholder="Escribe la ocupacion">
				      
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" onclick="validarActuPersona()" id="btnActualizarPersona" class="btn btn-primary">Actualizar</button>
</form>
			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('administracion/tablaPersona.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaPersona').click(function() {
          if (validarCategoria() == true) {
            datos=$('#addPersona').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "administracion/procePersona/agregarPersona.php",
               success:function(r) {
                    if (r==1) {
                        $('#addPersona')[0].reset();
                        
                        $('#tablaDatatable').load('administracion/tablaPersona.php');
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


		$('#btnActualizarPersona').click(function() {
      if (validarActuPersona() == true) {
        datos=$('#acPersona').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "administracion/procePersona/actualizarPersona.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('administracion/tablaPersona.php');
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
    function agregaFrmActualizarPersona(idPersona) {
        $.ajax({
            type:"POST",
            data:"idPersona=" + idPersona,
            url:"procePersona/obtenPersona.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idPersonaU').val(datos['idPersona']);
                $('#nombreU').val(datos['nombre']);
                $('#apellidoU').val(datos['apellido']);
                $('#telefonoU').val(datos['telefono']);
                $('#emailU').val(datos['email']);
                $('#ocupacionU').val(datos['ocupacion']);
                
              
            }
        });
    }

  </script>
  <script>
function validarPersona(){
var nombre= document.getElementById("nombre").value;
var apellido= document.getElementById("apellido").value;
var telefono= document.getElementById("telefono").value;
var email= document.getElementById("email").value;
var ocupacion= document.getElementById("ocupacion").value;


if ((nombre == "") || (apellido == "") || (telefono == "") || (email == "") || (ocupacion == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#nombre").keyup(validar_nombre)
    $("#apellido").keyup(validar_apellido)
    $("#telefono").keyup(validar_telefono)
    $("#email").keyup(validar_email)
    $("#ocupacion").keyup(validar_ocupacion)
     
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


  function validar_apellido() {
    var apellido= document.getElementById("apellido").value;

    if (apellido == null || apellido == 0) {
        var apellido = document.getElementById("apellido").style.border = "2px solid red";
        return false;
    } else {
        var apellido = document.getElementById("apellido").style.border = "2px solid #4caf50";
        return true;
    }
}

 function validar_telefono() {
    var telefono= document.getElementById("telefono").value;

    if (telefono == null || telefono == 0) {
        var telefono = document.getElementById("telefono").style.border = "2px solid red";
        return false;
    } else {
        var telefono = document.getElementById("telefono").style.border = "2px solid #4caf50";
        return true;
    }
}
 function validar_email() {
    var email= document.getElementById("email").value;

    if (email == null || email == 0) {
        var email = document.getElementById("email").style.border = "2px solid red";
        return false;
    } else {
        var email = document.getElementById("email").style.border = "2px solid #4caf50";
        return true;
    }
}

 function validar_ocupacion() {
    var ocupacion= document.getElementById("ocupacion").value;

    if (ocupacion == null || ocupacion == 0) {
        var ocupacion = document.getElementById("ocupacion").style.border = "2px solid red";
        return false;
    } else {
        var ocupacion = document.getElementById("ocupacion").style.border = "2px solid #4caf50";
        return true;
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////

function validarActuPersona(){


var nombre= document.getElementById("nombreU").value;
var apellido= document.getElementById("apellidoU").value;
var telefono= document.getElementById("telefonoU").value;
var email= document.getElementById("emailU").value;
var ocupacion= document.getElementById("ocupacionU").value;


if ((nombre == "") || (apellido == "") || (telefono == "") || (email == "") || (ocupacion == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocionU);

    function promocionU(){
    $("#nombreU").keyup(validar_nombreU)
    $("#apellidoU").keyup(validar_apellidoU)
    $("#telefonoU").keyup(validar_telefonoU)
    $("#emailU").keyup(validar_emailU)
    $("#ocupacionU").keyup(validar_ocupacionU)
     
}


  function validar_nombreU() {
    var nombre= document.getElementById("nombreU").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("nombreU").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("nombreU").style.border = "2px solid #4caf50";
        return true;
    }
}


  function validar_apellidoU() {
    var apellido= document.getElementById("apellidoU").value;

    if (apellido == null || apellido == 0) {
        var apellido = document.getElementById("apellidoU").style.border = "2px solid red";
        return false;
    } else {
        var apellido = document.getElementById("apellidoU").style.border = "2px solid #4caf50";
        return true;
    }
}

 function validar_telefonoU() {
    var telefono= document.getElementById("telefonoU").value;

    if (telefono == null || telefono == 0) {
        var telefono = document.getElementById("telefonoU").style.border = "2px solid red";
        return false;
    } else {
        var telefono = document.getElementById("telefonoU").style.border = "2px solid #4caf50";
        return true;
    }
}
 function validar_emailU() {
    var email= document.getElementById("emailU").value;

    if (email == null || email == 0) {
        var email = document.getElementById("emailU").style.border = "2px solid red";
        return false;
    } else {
        var email = document.getElementById("emailU").style.border = "2px solid #4caf50";
        return true;
    }
}

 function validar_ocupacionU() {
    var ocupacion= document.getElementById("ocupacionU").value;

    if (ocupacion == null || ocupacion == 0) {
        var ocupacion = document.getElementById("ocupacionU").style.border = "2px solid red";
        return false;
    } else {
        var ocupacion = document.getElementById("ocupacionU").style.border = "2px solid #4caf50";
        return true;
    }
}

</script>


	

