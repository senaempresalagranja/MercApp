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
						Categoria
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarCategoria">
							Agregar Categoria <span class="fa fa-plus-circle"></span>
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
	<div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega una nueva Categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					
					<form id="addCategoria" method="POST">
 

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Escribe la descripcion causa de la devolucion">

                        </form>
					
				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarCategoria()" id="btnAgregarnuevaCategoria" class="btn btn-primary">Agregar</button>

             
				</div>
				
				
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="ActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Categoria </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					<form id="acCategoria" method="POST">
						<label for="idCategoria">Codigo Categoria</label>
                   <input class="form-control" name="idCategoriaU" id="idCategoriaU" type="number" placeholder="Escribe nombre del responsable de recepcion" readonly>

                     <label for="nombre">Nombre</label>
                   <input class="form-control" name="nombreU" id="nombreU" type="text" placeholder="Escribe la descripcion causa de la devolucion">
				      </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" onclick="validarActuCategoria()" id="btnActualizarCategoria" class="btn btn-primary">Actualizar</button>

			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('productos/tablaCategoria.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaCategoria').click(function() {
          if (validarCategoria() == true) {
            datos=$('#addCategoria').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceCategoria/agregarCategoria.php",
               success:function(r) {
                    if (r==1) {
                        $('#addCategoria')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaCategoria.php');
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


		$('#btnActualizarCategoria').click(function() {
      if (validarActuCategoria() == true) {
        datos=$('#acCategoria').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceCategoria/ActualizarCategoria.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaCategoria.php');
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
    function agregaFrmActualizarCategoria(idCategoria) {
        $.ajax({
            type:"POST",
            data:"idCategoria=" + idCategoria,
            url:"productos/proceCategoria/obtenCategoria.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idCategoriaU').val(datos['idCategoria']);
                $('#nombreU').val(datos['nombre']);
              
            }
        });
    }

  </script>
  <script>
function validarCategoria(){


var nombre= document.getElementById("nombre").value;


if (nombre == ""){  //COMPRUEBA CAMPOS VACIOS
   
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

function validarActuCategoria(){

var idCategoria= document.getElementById("idCategoriaU").value; 
var nombre= document.getElementById("nombreU").value;


if ((idCategoria == "") || (nombre == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocionu);

    function promocionu(){
    $("#idCategoriaU").keyup(validar_idCategoria)
    $("#nombreU").keyup(validar_nombre)
     
}

  function validar_idCategoria() {
    var idCategoria= document.getElementById("idCategoriaU").value;

    if (idCategoria == null || idCategoria.length == 0 || /^\s+$/.test(idCategoria)) {
        var idCategoria = document.getElementById("idCategoriaU").style.border = "2px solid red";
        return false;
    } else {
        var idCategoria = document.getElementById("idCategoriaU").style.border = "2px solid #4caf50";
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


	

