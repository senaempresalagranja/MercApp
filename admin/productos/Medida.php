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
						Unidad Medida
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarUnidadMedida">
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
  <div class="modal fade" id="agregarUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega nueva Unidad de Medida</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          
          <form id="addUnidadMedida" method="POST">
                 

                     <label for="unidadMedida">Unidad de medida</label>
                   <input class="form-control" name="unidadMedida" id="unidadMedida" type="text" placeholder="Escribe la descripcion causa de la devolucion">

                 
          
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="validarUnidadMedida()" id="btnAgregarnuevaUnidadMedida" class="btn btn-primary">Agregar</button>

</form> 
  </script>            
        </div>
        
        
      </div>
    </div>
  </div>
<!-- Modal -->
  <div class="modal fade" id="ActualizarUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar unidad de medida</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
        <form id="acUnidadMedida">
      

            <label for="idUnidadMedida">Codigo unidad medida</label>
                   <input class="form-control" name="idUnidadMedidaU" id="idUnidadMedidaU" type="number" placeholder="Escribe nombre del responsable de recepcion" readonly>

                     <label for="unidadMedida">unidad de medida</label>
                   <input class="form-control" name="unidadMedidaU" id="unidadMedidaU" type="text" placeholder="Escribe la descripcion causa de la devolucion">

               
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" onclick="validarActuUnidadMed()" id="btnActualizarUnidadMedida" class="btn btn-primary">Actualizar</button>

      </div>
      </form>   
    </div>
  </div>


</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaDatatable').load('productos/tablaMedida.php');
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaUnidadMedida').click(function() {
          if (validarUnidadMedida() == true) {
            datos=$('#addUnidadMedida').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceUni/agregarUni.php",
               success:function(r) {
                    if (r==1) {
                        $('#addUnidadMedida')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaMedida.php');
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


    $('#btnActualizarUnidadMedida').click(function() {
      if (validarActuUnidadMed() == true) {
        datos=$('#acUnidadMedida').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceUni/actualizarUni.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaMedida.php');
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
    function agregaFrmActualizarUnidadMedida(idUnidadMedida) {

        $.ajax({


            type:"POST",
            data:"idUnidadMedida=" + idUnidadMedida,
            url:"productos/proceUni/obtenUni.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idUnidadMedidaU').val(datos['idUnidadMedida']);
                $('#unidadMedidaU').val(datos['unidadMedida']);
              
            }
        });
    }

  </script>
  <script>
function validarUnidadMedida(){


var nombre= document.getElementById("unidadMedida").value;



if (nombre == "") {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#unidadMedida").keyup(validar_nombreu)

     
}


  function validar_nombreu() {
    var nombre= document.getElementById("unidadMedida").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("unidadMedida").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("unidadMedida").style.border = "2px solid #4caf50";
        return true;
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////

function validarActuUnidadMed(){

var idUnidad= document.getElementById("idUnidadMedidaU").value; 
var nombre= document.getElementById("unidadMedidaU").value;



if ((idUnidad == "") || (nombre == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocionu);

    function promocionu(){
    $("#idUnidadMedidaU").keyup(validar_idUnidad)
    $("#unidadMedidaU").keyup(validar_nombre)
     
}

  function validar_idUnidad() {
    var idUnidad= document.getElementById("idUnidadMedidaU").value;

    if (idUnidad == null || idUnidad.length == 0 || /^\s+$/.test(idUnidad)) {
        var idUnidad = document.getElementById("idUnidadMedidaU").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidadMedidaU").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_nombre() {
    var nombre= document.getElementById("unidadMedida").value;

    if (nombre == null || nombre == 0) {
        var nombre = document.getElementById("unidadMedida").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("unidadMedida").style.border = "2px solid #4caf50";
        return true;
    }
}


</script>