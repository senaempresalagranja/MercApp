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
            Traslados
          </div>
          <div class="card-body">
            <span class="btn btn-primary" data-toggle="modal" data-target="#agregarTranslado">
              Agregar traslado <span class="fa fa-plus-circle"></span>
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
  <div class="modal fade" id="agregarTranslado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega un nuevo traslado</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          
          <form id="addDevolucion" method="POST">
 <?php

$conexion = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");

$unidad       = mysqli_query($conexion, "SELECT idUnidad, nombre FROM tbunidad") or die("problemas del select" . mysqli_error($conexion));

$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));

// $responsable = mysqli_query($conexion, "SELECT idPersona, nombre, apellido FROM tbpersona") or die("problemas del select" . mysqli_error($conexion));
?>           

                  <label for="tipoCausa">Tipo</label>
                    <select class="form-control" id="tipoCausa" name="tipoCausa" >
                  <option>Selecciona si es traslado o devolucion</option>
                  <option>DEVOLUCION </option>
                        <option>TRASLADO</option>
                    </select>

                   

                    <label for="fecha">Fecha</label>
                    <input class="form-control" name="fecha" id="fecha" type="Date" placeholder="fecha" onchange="validar_fecha()"> 

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fecha').val(today);
                                            })
                    </script> 

                     

                    <label for="idUnidad">Unidad Destino </label>

                    <select class="form-control" id="idUnidad" name="idUnidad" onchange="validar_idunidad()">
                      <option></option>
                       <?php
            while ($uni = mysqli_fetch_array($unidad)) {

               ?>
                      <option value="<?php echo ($uni['idUnidad']) ?>"><?php echo $uni['nombre'] ?></option>
                       <?php }?>
                    </select>   

                    <label for="causa">Causa</label>
                    <select class="form-control" id="causa" name="causa" onchange="validar_causa()">
                  <option></option>
                  <option>ENVASE ROTO </option>
                        <option>VENCIDO</option>
                        <option>HONGOS</option>
                        <option>TOXICO</option>
                    </select>

                   </select> 
                    
                    <label for="referencia">Referencia</label>
                    <select class="form-control" id="referencia" name="referencia" onchange="validar_referencia()">
                        <option></option>
                        <option>MP</option>
                        <option>IN</option>
                        <option>EI</option>
                        <option>MR</option>
                        <option>NUEVO</option>
                        <option>PT</option>
                      </select>

                    <label for="responsableRecepcion">Responsable recepcion</label>
                     <input class="form-control" name="responsableRecepcion" id="responsableRecepcion" type="text" placeholder="Escribe el Nombre">
                <!--    <select class="form-control" name="responsableRecepcion" id="responsableRecepcion" type="text" placeholder="Escribe nombre del responsable de recepcion"> -->
                  
                  <label for="idProducto">Producto</label>
                    <select required="required" class="form-control" id="idProducto" name="idProducto" onchange="validar_codigoPro()">
                        <option > Seleciona</option>
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select>   


                    

                    <label for="cantidad">cantidad</label>
                   <input class="form-control" name="cantidad" id="cantidad" type="number" placeholder="Escribe el Nombre">

                 
                    <label for="descripcionCausa">Descripcion causa</label>
                   <input class="form-control" name="descripcionCausa" id="descripcionCausa" type="text" placeholder="Escribe la descripcion causa de la devolucion">
                    

                        </form>
          
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="validarentrada()" id="btnAgregarnuevoTraslado" class="btn btn-primary">Agregar</button>

             
        </div>
        
        
      </div>
    </div>
  </div>
<!-- Modal -->
  <div class="modal fade" id="ActualizarDevolucion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar devolucion </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      
          <form id="actualizarDevolucion" method="POST">
             <?php

$conexion = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");

$unidad       = mysqli_query($conexion, "SELECT idUnidad, nombre FROM tbunidad") or die("problemas del select" . mysqli_error($conexion));

$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));
$responsable = mysqli_query($conexion, "SELECT idPersona, nombre, apellido FROM tbpersona") or die("problemas del select" . mysqli_error($conexion));


?>         

                   <label for="idTraslado">id Traslado</label>
                   <input class="form-control" name="idTrasladoU" id="idTrasladoU" type="text" placeholder="Escribe nombre del responsable de recepcion">

                   <label for="tipoCausa">Tipo</label>
                    <select class="form-control" id="tipoCausaU" name="tipoCausaU" >
                  <option>Selecciona si es traslado o devolucion</option>
                  <option>DEVOLUCION </option>
                        <option>TRASLADO</option>
                    </select>  

                    <label for="fecha">Fecha</label>
                    <input class="form-control" name="fechaU" id="fechaU" type="Date" placeholder="fecha" onchange=" return validar_fecha()"> 

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fecha').val(today);
                                            })
                    </script> 

                    <label for="idUnidad">Unidad Destino </label>

                    <select class="form-control" id="idUnidadU" name="idUnidadU" onchange="validar_causa()">
                      <option></option>
                       <?php
            while ($uni = mysqli_fetch_array($unidad)) {

               ?>
                      <option value="<?php echo ($uni['idUnidad']) ?>"><?php echo $uni['nombre'] ?></option>
                       <?php }?>
                    </select>   

                    <label for="causa">Causa</label>
                    <select class="form-control" id="causaU" name="causaU" onchange="validar_causa()">
                  <option></option>
                  <option>ENVASE ROTO</option>
                        <option>VENCIDO</option>
                        <option>HONGOS</option>
                        <option>TOXICO</option>
                    </select>
                  
                    
                    <label for="referencia">Referencia</label>
                    <select class="form-control" id="referenciaU" name="referenciaU" onchange="validar_referencia()">
                        <option></option>
                        <option>MP</option>
                        <option>IN</option>
                        <option>EI</option>
                        <option>MR</option>
                        <option>NUEVO</option>
                        <option>PT</option>
                      </select>

                    <label for="responsableRecepcionU">Responsable recepcion</label>
                     <input class="form-control" name="responsableRecepcionU" id="responsableRecepcionU" type="text" placeholder="Escribe el Nombre">

                    <label for="idProducto">Producto</label>

                    <select class="form-control" id="idProductoU" name="idProductoU" onchange="validar_codigoPro()">
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select>

                    

                    <label for="cantidad">cantidad</label>
                   <input class="form-control" name="cantidadU" id="cantidadU" type="text" placeholder="Escribe el Nombre">

                 
                    <label for="descripcionCausa">Descripcion causa</label>
                   <input class="form-control" name="descripcionCausaU" id="descripcionCausaU" type="text" placeholder="Escribe la descripcion causa de la devolucion">

                   <label for="idTrasladoProducto">Traslado producto</label>
                   <input class="form-control" name="idTrasladoProductoU" id="idTrasladoProductoU" type="text" placeholder="Escribe la descripcion causa de la devolucion">
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" onclick="validaractualizaEntre()" id="btnActualizarDevolucion" class="btn btn-primary">Actualizar</button>
                
              
                    
                  
        
        
      </div>
    </div>
  </div>



  


</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaDatatable').load('productos/tablaDevolucion.php');
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btnAgregarnuevoTraslado').click(function() {
          if (validarentrada() == true) {
            datos=$('#addDevolucion').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceDevo/agregarDevo.php",
               success:function(r) {
                    if (r==1) {
                        $('#addDevolucion')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaDevolucion.php');
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


    $('#btnActualizarDevolucion').click(function() {
      if (validaractualizaEntre() == true) {
        datos=$('#actualizarDevolucion').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceDevo/actualizarDevo.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaDevolucion.php');
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
    function agregaFrmActualizarDevolucion(idTraslado) {
        $.ajax({
            type:"POST",
            data:"idTraslado=" + idTraslado,
            url:"productos/proceDevo/obtenDevo.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#idTrasladoU').val(datos['idTraslado']);
                $('#tipoCausaU').val(datos['tipoCausa']);
                $('#fechaU').val(datos['fecha']);
                $('#idUnidadU').val(datos['idUnidad']);
                $('#causaU').val(datos['causa']);
                $('#referenciaU').val(datos['referencia']);
                $('#responsableRecepcionU').val(datos['responsableRecepcion']);
                $('#idProductoU').val(datos['idProducto']);
                $('#cantidadU').val(datos['cantidad']);
                $('#descripcionCausaU').val(datos['descripcionCausa']);
                $('#idTrasladoProductoU').val(datos['idTrasladoProducto']);
            }
        });
    }

  </script>
  <script>
function validarentrada(){

var fecha= document.getElementById("fecha").value; 
var idUnidad= document.getElementById("idUnidad").value;
var causa = document.getElementById("causa").value;
var referencia = document.getElementById("referencia").value;
var responsableRecepcion= document.getElementById("responsableRecepcion").value;
var idProducto= document.getElementById("idProducto").value;
var cantidad= document.getElementById("cantidad").value;
var descripcionCausa= document.getElementById("descripcionCausa").value;




if ((fecha == "") || (idUnidad == "") || (causa == "") || (referencia == "") || (responsableRecepcion == "")|| (idProducto == "") || (cantidad == "") || (descripcionCausa == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(iloteen);

    function promocion(){
    $("#fecha").keyup(validar_fecha)
    $("#idUnidad").keyup(validar_idunidad)
   $("#causa").keyup(validar_causa)
   $("#referencia").keyup(validar_referencia)
   $("#responsableRecepcion").keyup(validar_responsableRecepcion)
   $("#idProducto").keyup(validar_codigoPro)
   $("#cantidad").keyup(validar_cantidad)
   $("#descripcionCausa").keyup(validar_descripcioncausa)

    
}


function validar_fecha() {
      var fecha = document.getElementById("fecha").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fecha.length !== 10 )
         error = true;

      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fecha) )
         error = true;

      // Mediante el delimitador "/" separa dia, mes y año
      var fecha = fecha.split("/");
      var day = parseInt(fecha[0]);
      var month = parseInt(fecha[1]);
      var year = parseInt(fecha[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 )
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 )
            error = true;
         if ( lyear === true && day > 29 )
            error = true;
      }

      if ( error === true ) {
         var fecha = document.getElementById("fecha").style.border = "2px solid #4caf50";
                
         return false;
      } else {
         var fechaProduccion = document.getElementById("fecha").style.border = "2px solid red";

      return true;
  }
}
  function validar_idunidad() {
    var idUnidad= document.getElementById("idUnidad").value;

    if (idUnidad == null || idUnidad == 0) {
        var idUnidad = document.getElementById("idUnidad").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidad").style.border = "2px solid #4caf50";
        return true;
    }
}


  function validar_causa() {
    var causa= document.getElementById("causa").value;

    if (causa == null || causa.length == 0 || /^\s+$/.test(causa)) {
        var causa = document.getElementById("causa").style.border = "2px solid red";
        return false;
    } else {
        var causa = document.getElementById("causa").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_referencia() {
    var referencia= document.getElementById("referencia").value;

    if (referencia == null || referencia == 0) {
        var referencia = document.getElementById("referencia").style.border = "2px solid red";
        return false;
    } else {
        var referencia = document.getElementById("referencia").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsableRecepcion() {
    var responsableRecepcion= document.getElementById("responsableRecepcion").value;

    if (responsableRecepcion == null || responsableRecepcion.length == 0 || /^\s+$/.test(responsableRecepcion)) {
        var responsableRecepcion = document.getElementById("responsableRecepcion").style.border = "2px solid red";
        return false;
    } else {
        var responsableRecepcion = document.getElementById("responsableRecepcion").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_codigoPro() {
    var idProducto= document.getElementById("idProducto").value;

    if (idProducto == null || idProducto == 0) {
        var idProducto = document.getElementById("idProducto").style.border = "2px solid red";
        return false;
    } else {
        var idProducto = document.getElementById("idProducto").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_cantidad() {
  var cantidad = document.getElementById("cantidad").value;

  var cantidad = this.value;
  this.value = cantidad.replace(/\D|\-/,'');


if ( isNaN(cantidad) ) {
    var cantidad = document.getElementById("cantidad").style.border = "2px solid red";
            
         return false;
      } else {
         
var cantidad = document.getElementById("cantidad").style.border = "2px solid #4caf50";
      return true;
   }
}

     function validar_descripcioncausa() {
    var descripcionCausa= document.getElementById("descripcionCausa").value;

    if (descripcionCausa == null || descripcionCausa.length == 0 || /^\s+$/.test(causa)) {
        var descripcionCausa = document.getElementById("descripcionCausa").style.border = "2px solid red";
        return false;
    } else {
        var descripcionCausa = document.getElementById("descripcionCausa").style.border = "2px solid #4caf50";
        return true;
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////

function validaractualizaEntre(){

var fecha= document.getElementById("fechaU").value; 
var idUnidad= document.getElementById("idUnidadU").value;
var causa = document.getElementById("causaU").value;
var referencia = document.getElementById("referenciaU").value;
var responsableRecepcion= document.getElementById("responsableRecepcionU").value;
var idProducto= document.getElementById("idProductoU").value;
var cantidad= document.getElementById("cantidadU").value;
var descripcionCausa= document.getElementById("descripcionCausaU").value;




if ((fecha == "") || (idUnidad == "") || (causa == "") || (referencia == "") || (responsableRecepcion == "")|| (idProducto == "") || (cantidad == "") || (descripcionCausa == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(iloteen);

    function iloteen(){
    $("#fechaU").keyup(validar_fecha)
    $("#idUnidadU").keyup(validar_idunidad)
   $("#causaU").keyup(validar_causa)
   $("#referenciaU").keyup(validar_referencia)
   $("#responsableRecepcionU").keyup(validar_responsableRecepcion)
   $("#idProductoU").keyup(validar_codigoPro)
   $("#cantidadU").keyup(validar_cantidad)
   $("#descripcionCausaU").keyup(validar_descripcioncausa)

    
}


function validar_fecha() {
      var fechaProduccion = document.getElementById("fechaProduccionU").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaProduccion.length !== 10 )
         error = true;

      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaProduccion) )
         error = true;

      // Mediante el delimitador "/" separa dia, mes y año
      var fechaProduccion = fechaProduccion.split("/");
      var day = parseInt(fechaProduccion[0]);
      var month = parseInt(fechaProduccion[1]);
      var year = parseInt(fechaProduccion[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 )
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 )
            error = true;
         if ( lyear === true && day > 29 )
            error = true;
      }

      if ( error === true ) {
         var fechaProduccion = document.getElementById("fechaProduccionU").style.border = "2px solid #4caf50";
                
         return false;
      } else {
         var fechaProduccion = document.getElementById("fechaProduccionU").style.border = "2px solid red";

      return true;
  }
}
  function validar_idunidad() {
    var idUnidad= document.getElementById("idUnidadU").value;

    if (idUnidad == null || idUnidad == 0) {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid red";
        return false;
    } else {
        var idUnidad = document.getElementById("idUnidadU").style.border = "2px solid #4caf50";
        return true;
    }
}


  function validar_causa() {
    var causa= document.getElementById("causaU").value;

    if (causa == null || causa.length == 0 || /^\s+$/.test(causa)) {
        var causa = document.getElementById("causaU").style.border = "2px solid red";
        return false;
    } else {
        var causa = document.getElementById("causaU").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_referencia() {
    var referencia= document.getElementById("referenciaU").value;

    if (referencia == null || referencia == 0) {
        var referencia = document.getElementById("referenciaU").style.border = "2px solid red";
        return false;
    } else {
        var referencia = document.getElementById("referenciaU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsableRecepcion() {
    var responsableRecepcion= document.getElementById("responsableRecepcionU").value;

    if (responsableRecepcion == null || responsableRecepcion.length == 0 || /^\s+$/.test(responsableRecepcion)) {
        var responsableRecepcion = document.getElementById("responsableRecepcionU").style.border = "2px solid red";
        return false;
    } else {
        var responsableRecepcion = document.getElementById("responsableRecepcionU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_codigoPro() {
    var idProducto= document.getElementById("idProductoU").value;

    if (idProducto == null || idProducto == 0) {
        var idProducto = document.getElementById("idProductoU").style.border = "2px solid red";
        return false;
    } else {
        var idProducto = document.getElementById("idProductoU").style.border = "2px solid #4caf50";
        return true;
    }
}

  function validar_cantidad() {
  var cantidad = document.getElementById("cantidadU").value;

  var cantidad = this.value;
  this.value = cantidad.replace(/\D|\-/,'');


if ( isNaN(cantidad) ) {
    var cantidad = document.getElementById("cantidadU").style.border = "2px solid red";
            
         return false;
      } else{
         
var cantidad = document.getElementById("cantidadU").style.border = "2px solid #4caf50";
      return true;
   }
 }  

     function validar_descripcioncausa() {
    var descripcionCausa= document.getElementById("descripcionCausaU").value;

    if (descripcionCausa == null || descripcionCausa.length == 0 || /^\s+$/.test(causa)) {
        var descripcionCausa = document.getElementById("descripcionCausaU").style.border = "2px solid red";
        return false;
    } else {
        var descripcionCausa = document.getElementById("descripcionCausaU").style.border = "2px solid #4caf50";
        return true;
    }
}

</script>


  

