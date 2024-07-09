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
						Promocion
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarPromocion">
							Agregar Promocion <span class="fa fa-plus-circle"></span>
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
	<div class="modal fade" id="agregarPromocion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega un nuevo Promocion</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
					
					<form id="addPromocion" method="POST">
          
                   <?php
$conexion= mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));
?>

                    <label for="fechaInicio">Fecha Inicio</label>
                    <input class="form-control" name="fechaInicio" id="fechaInicio" type="Date" placeholder="fechaInicio" onchange="validar_fechainicio()"> 

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fechaInicio').val(today);
                                            })
                    </script> 

                     <label for="fechaFin">Fecha Fin</label>
                   <input class="form-control" name="fechaFin" id="fechaFin" type="Date" onchange="return validar_fechafinal()">
                      <label for="idProducto">Codigo Producto</label>
                    <select required="required" class="form-control" id="idProducto" name="idProducto">
                        <option > Seleciona</option>
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select> 
                      <label for="valorActual">Valor actual del producto</label>
                   <input class="form-control" name="valorActual" id="valorActual" type="number" placeholder="Escribe el valor actual del producto">

                    


                    <label for="valorPromocion">Valor promocion</label>
                    <input class="form-control" type="number" name="valorPromocion" id="valorPromocion" placeholder="Escribe el valor Promocional del producto"> 

                    <label for="cantidad">Cantidad</label>
                    <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Escribe el valor Promocional del producto">

                   <label> Imagen de La Promocion</label>
                    <input type="file"  id="img" name="img"> 

                   
                    
                    

                        </form>
					
				</div>
				<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" onclick="validarPromo()" id="btnAgregarnuevaPromocion" class="btn btn-primary">Agregar</button>

             
				</div>
				
				
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id="ActualizarPromocion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Promocion </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
			
					<form id="acPromocion" method="POST">
                               <?php
$conexion= mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));
?>

				    <label for="idPromocion">ID Promocion</label>
                    <input class="form-control" name="idPromocionU" id="idPromocionU" type="number" placeholder="idPromocionU"> 

                   <label for="fechaInicio">Fecha Inicio</label>
                    <input class="form-control" name="fechaInicioU" id="fechaInicioU" type="Date" placeholder="fechaInicioU" onchange="validar_fechainicio()"> 

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fechaInicio').val(today);
                                            })
                    </script> 

                     <label for="fechaFin">Fecha Fin</label>
                   <input class="form-control" name="fechaFinU" id="fechaFinU" type="Date" onchange="return validar_fechafinal()">
                    <label for="idProductoU">Codigo Producto</label>
                    <select required="required" class="form-control" id="idProductoU" name="idProductoU">
                        <option > Seleciona</option>
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select> 
                     <label for="valorActualU">Valor actual del producto</label>
                   <input class="form-control" name="valorActualU" id="valorActualU" type="number" placeholder="Escribe el valor actual del producto">

                    <label for="valorPromocionU">Valor promocion</label>
                    <input class="form-control" type="number" name="valorPromocionU" id="valorPromocionU" placeholder="Escribe el valor Promocional del producto"> 
                     <label for="cantidadU">Cantidad</label>
                    <input class="form-control" type="number" name="cantidadU" id="cantidadU" placeholder="Escribe el valor Promocional del producto">
                   <label> Imagen de La Promocion</label>
                    <input type="file"  id="imgU" name="imgU"> 
                    
				      </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" onclick="validarActupromo()" id="btnActualizarPromocion" class="btn btn-primary">Actualizar</button>

			</div>
		</div>
	</div>


</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('productos/tablaPromocion.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevaPromocion').click(function() {
          if (validarPromo() == true) {
            var datos = new FormData($("#addPromocion")[0]);


            $.ajax({
                type:"POST",
				data: datos,
				contentType: false,
				processData: false,
                url: "productos/procePromocion/agregarPromocion.php",
               success:function(r) {
                    if (r==1) {
                        $('#addPromocion')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaPromocion.php');
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


		$('#btnActualizarPromocion').click(function() {
      if (validarActupromo() == true) {
        var datos = new FormData($("#acPromocion")[0]);

        $.ajax({
            type:"POST",
				data: datos,
				contentType: false,
				processData: false,
            url: "productos/procePromocion/actualizarPromocion.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaPromocion.php');
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
    function agregaFrmActualizarPromocion(idPromocion) {
        $.ajax({
            type:"POST",
            data:"idPromocion=" + idPromocion,
            url:"productos/procePromocion/obtenPromocion.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idPromocionU').val(datos['idPromocion']);
                $('#fechaInicioU').val(datos['fechaInicio']);
                $('#fechaFinU').val(datos['fechaFin']);
                $('#idProductoU').val(datos['idProducto']);
                $('#valorActualU').val(datos['valorActual']);
                $('#valorPromocionU').val(datos['valorPromocion']);
                $('#cantidadU').val(datos['cantidad']);
                $('#imgU').val(datos['img']);
                
            }
        });
    }

  </script>
  <script>
function validarPromo(){

var fechaInicio= document.getElementById("fechaInicio").value; 
var fechaFin= document.getElementById("fechaFin").value;
var valor= document.getElementById("valorActual").value;
var valorPromocion= document.getElementById("valorPromocion").value;
var cantidad= document.getElementById("cantidad").value;




if ((fechaInicio == "") || (fechaFin == "" ) || (valor == "" ) || (valorPromocion == "" )|| (cantidad == "" )) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#fechaInicio").keyup(validar_fechainicio)
    $("#fechaFin").keyup(validar_fechafinal)
    $("#valorActual").keyup(validarValorAc)
    $("#valorPromocion").keyup(validarValorPromo)
    $("#cantidad").keyup(validar_cantidad)
    
   

    
}


function validar_fechainicio() {
      var fechaInicio = document.getElementById("fechaInicio").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaInicio.length !== 10 ){
         error = true;
}
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaInicio) ){
         error = true;
}
      // Mediante el delimitador "/" separa dia, mes y año
      var fechaInicio = fechaInicio.split("/");
      var day = parseInt(fechaInicio[0]);
      var month = parseInt(fechaInicio[1]);
      var year = parseInt(fechaInicio[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 ){
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;
}
      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;
         }
         if ( lyear === true && day > 29 ){
            error = true;
         }
      }

      if ( error === true ) {
         var fechaInicio = document.getElementById("fechaInicio").style.border = "2px solid #4caf50";
                
         return false;
      } else{
         var fechaInicio = document.getElementById("fechaInicio").style.border = "2px solid red";

      return true;
  }
}
  function validar_fechafinal() {
      var fechaFin = document.getElementById("fechaFin").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaFin.length !== 10 ){
         error = true;
}
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaFin) ){
         error = true;
}
      // Mediante el delimitador "/" separa dia, mes y año
      var fechaFin = fechaFin.split("/");
      var day = parseInt(fechaFin[0]);
      var month = parseInt(fechaFin[1]);
      var year = parseInt(fechaFin[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 ){
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;
}
      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;
         }
         if ( lyear === true && day > 29 ){
            error = true;
         }
      }

      if ( error === true ) {
         var fechaFin = document.getElementById("fechaFin").style.border = "2px solid #4caf50";
                
         return false;
      }else{
         var fechaFin = document.getElementById("fechaFin").style.border = "2px solid red";

      return true;

    }
  }
   function validarValorAc() {
    var valor= document.getElementById("valorActual").value;

    if (valor == null || valor == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(valor)) {
        var valor = document.getElementById("valorActual").style.border = "2px solid red";
        return false;
    } else {
        var valor = document.getElementById("valorActual").style.border = "2px solid #4caf50";
        return true;
    }
}
   function validarValorPromo() {
    var valorPromocion= document.getElementById("valorPromocion").value;

    if (valorPromocion == null || valorPromocion == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(valorPromocion)) {
        var valorPromocion = document.getElementById("valorPromocion").style.border = "2px solid red";
        return false;
    } else {
        var valorPromocion = document.getElementById("valorPromocion").style.border = "2px solid #4caf50";
        return true;
    }
}

   function validar_cantidad() {
    var cantidad= document.getElementById("cantidad").value;

    if (cantidad == null || cantidad == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(cantidad)) {
        var cantidad = document.getElementById("cantidad").style.border = "2px solid red";
        return false;
    } else {
        var cantidad = document.getElementById("cantidad").style.border = "2px solid #4caf50";
        return true;
    }
}

       
</script>
<script >
//////////////////////////////////////////////////////////////////////////////////////////////////

function validarActupromo(){

var fechaInicio= document.getElementById("fechaInicioU").value; 
var fechaFin= document.getElementById("fechaFinU").value;
var idProducto= document.getElementById("idProductoU").value; 
var valor= document.getElementById("valorActualU").value;
var valorPromocion = document.getElementById("valorPromocionU").value;
var cantidadU = document.getElementById("cantidadU").value;



if ((fechaInicio == "") || (fechaFin == "") || (valor == "") || (valorPromocion == "") || (cantidadU == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(promocion);

    function promocion(){
    $("#fechaInicioU").keyup(validar_fechainicio)
    $("#fechaFinU").keyup(validar_fechafinal)
    $("#valorActualU").keyup(validarValorActa)
    $("#valorPromocionU").keyup(validarValorPromoa)
    $("#cantidadU").keyup(validar_cantidadU)
    

    
}


function validar_fechainicio() {
      var fechaInicio = document.getElementById("fechaInicioU").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaInicio.length !== 10 ){
         error = true;
}
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaInicio) ){
         error = true;
}
      // Mediante el delimitador "/" separa dia, mes y año
      var fechaInicio = fechaInicio.split("/");
      var day = parseInt(fechaInicio[0]);
      var month = parseInt(fechaInicio[1]);
      var year = parseInt(fechaInicio[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 )
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined ){
            error = true;
         }

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;
         }
         if ( lyear === true && day > 29 ){
            error = true;
         }
      }

      if ( error === true ) {
         var fechaInicio = document.getElementById("fechaInicioU").style.border = "2px solid #4caf50";
                
         return false;
      } else {
         var fechaInicio = document.getElementById("fechaInicioU").style.border = "2px solid red";

      return true;
    }
  }
  function validar_fechafinal() {
      var fechaFin = document.getElementById("fechaFinU").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaFin.length !== 10 ){
         error = true;
}
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaFin) ){
         error = true;
}
      // Mediante el delimitador "/" separa dia, mes y año
      var fechaFin = fechaFin.split("/");
      var day = parseInt(fechaFin[0]);
      var month = parseInt(fechaFin[1]);
      var year = parseInt(fechaFin[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 )
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined ){
            error = true;
         }

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;
         }
         if ( lyear === true && day > 29 ){
            error = true;
         }
      }

      if ( error === true ) {
         var fechaFin = document.getElementById("fechaFinU").style.border = "2px solid #4caf50";
                
         return false;
      } else{
         var fechaFin = document.getElementById("fechaFinU").style.border = "2px solid red";

      return true;
    }
  }

   function validarValorActa() {
    var valor= document.getElementById("valorActualU").value;

    if (valor == null || valor == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(valor)) {
        var valor = document.getElementById("valorActualU").style.border = "2px solid red";
        return false;
    } else {
        var valor = document.getElementById("valorActualU").style.border = "2px solid #4caf50";
        return true;
    }
}
   function validarValorPromoa() {
    var valorPromocion= document.getElementById("valorPromocionU").value;

    if (valorPromocion == null || valorPromocion == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(valorPromocion)) {
        var valorPromocion = document.getElementById("valorPromocionU").style.border = "2px solid red";
        return false;
    } else {
        var valorPromocion = document.getElementById("valorPromocionU").style.border = "2px solid #4caf50";
        return true;
    }
}

   function validar_cantidadU() {
    var cantidadU= document.getElementById("cantidadU").value;

    if (cantidadU == null || cantidadU == 0 ||  /([?1234567890][.][1234567890][1234567890])+$/.test(cantidadU)) {
        var cantidadU = document.getElementById("cantidadU").style.border = "2px solid red";
        return false;
    } else {
        var cantidadU = document.getElementById("cantidadU").style.border = "2px solid #4caf50";
        return true;
    }
}


</script>


	

