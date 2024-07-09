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
                        Productos
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#agregarEntrada">
                            Agregar entrada <span class="fa fa-plus-circle"></span>
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
    <div class="modal fade" id="agregarEntrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agrega un nueva entrada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="addEntrada" method="POST">

                        <?php

$conexion = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");


$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));

$lot= mysqli_query($conexion, "SELECT idLote FROM tblote") or die ("problemas del select lote ");

$responsable = mysqli_query($conexion, "SELECT idPersona, nombre, apellido FROM tbpersona") or die("problemas del select" . mysqli_error($conexion));
?>
<?php
$conexion= mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));
?>

                    <label for="codigoLote">codigo Lote</label>
                    <input required="required" style=" " class="form-control input-sm" id="codigoLote" name="codigoLote" type="text" required>

                   

                    <label for="responsableProduccion">Responsable Produccion </label>
                     <input required="required" style=" " class="form-control input-sm" id="responsableProduccion" name="responsableProduccion" type="text" required>
                    <!-- <select required="required" class="form-control input-sm" id="responsableProduccion" name="responsableProduccion" type="text" > -->
                    
                    <label for="fechaProduccion">Fecha producion </label>
                    <input required="required" class="form-control input-sm" id="fechaProduccion" name="fechaProduccion" onchange="return esfechavalida();" type="Date" placeholder="Nombre del responsable de entregar la produccion ">

                     <label for="idProducto">Codigo Producto</label>
                    <select required="required" class="form-control" id="idProducto" name="idProducto" onchange="validar_codigoPro()">
                        <option > Seleciona</option>
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select>   

                    <label for="cantidad">Cantidad  llegada </label>
                    <input required="required" class="form-control input-sm" id="cantidad" name="cantidad" type="number" placeholder="Cantidad de producto que entra ">

                    <label for="fechaVencimiento">Fecha vencimiento </label>

                    <input class="form-control input-sm" id="fechaVencimiento" name="fechaVencimiento" type="Date" placeholder="Nombre del responsable de entregar la produccion ">

                     <label for="valorUnitario">Valor Unitario</label>
                    <input class="form-control input-sm" id="valorUnitario" name="valorUnitario" type="number" placeholder="Escribe la fecha de produccion">

                    <label for="fechaEntrada">Fecha  entrada</label>
                    
                    <input class="form-control" id="fecha" name="fecha" type="Date" placeholder="Escribe la fecha en que ingresa el producto" readonly>

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fecha').val(today);
                                            })
                    </script>


                    

                    <label for="responsableRcibir"> Responsable recibir</label>
                    <input class="form-control" id="responsableRcibir" name="responsableRcibir" type="text" placeholder="Escribe el nombre del responsable de recibir">

                    <label for="horaEntrada"> Hora entrada </label>
                    <input class="form-control" id="horaEntrada" name="horaEntrada" type="times" placeholder="Escribe la hora en que la qu ingresa el producto "readonly>

                    <script>
                        $(document).ready( function mostrarhora(){
                                                 
                                                var cad = new Date().toLocaleTimeString();
                                                

                                            $('#horaEntrada').val(cad);
                                            })
                    </script>

                    
                    <label for="cantidad">cantidad entrada</label>
                    <input class="form-control" name="cantidadEntrar" id="cantidadEntrar" type="number" placeholder="Escribe el Nombre">

      
                    <label for="valorTotal"> Valor total entrada </label>
                    <input class="form-control" id="valorTotal" name="valorTotal" type="number" placeholder="Escribe el Precio de Venta">

                            

                             <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="validarfor()" id="btnAgregarEntrada" class="btn btn-primary">Aregar</button>

                </div>
                    </form>
                </div>




            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="actualizarEntrada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar  producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="acEntrada" method="POST">

                        <?php

$conexion = mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");


$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));

$lot= mysqli_query($conexion, "SELECT idLote FROM tblote") or die ("problemas del select lote ");

// $entradas= mysqli_query($conexion, "SELECT idEntrada FROM tbentrda") or die ("problemas en el id entrada");


?>
<?php
$conexion= mysqli_connect("localhost", "root", "", "dbmercapp") or die("problemas con la conexión");
$pro= mysqli_query($conexion, "SELECT idProducto, nombre FROM tbproducto") or die("problemas del select" . mysqli_error($conexion));
$responsable = mysqli_query($conexion, "SELECT idPersona, nombre, apellido FROM tbpersona") or die("problemas del select" . mysqli_error($conexion));
?>
                    <label for="idEntrada">entrada</label>
                    <input style=" " class="form-control input-sm" id="idEntradaU" name="idEntradaU" readonly>

                    <label for="codigoLote">codigo Lote</label>
                    <input style=" " class="form-control input-sm" id="codigoLoteU" name="codigoLoteU" type="text"  >
                    
                    
                    <label for="responsableProduccion">Responsable Produccion </label>
                    <select class="form-control input-sm" id="responsableProduccionU" name="responsableProduccionU" type="text"  placeholder="Nombre del responsable de entregar la produccion ">
                    <?php
                        while ($res = mysqli_fetch_array($responsable)) {

                        ?>
                      <option value="<?php echo ($res['idPersona']) ?>"><?php echo $res['nombre'] ?> <?php echo $res['apellido'] ?></option>
                       <?php }?>
                    </select> 
                    <label for="fechaProduccion">Fecha producion </label>
                    <input class="form-control input-sm" id="fechaProduccionU" name="fechaProduccionU" type="Date" placeholder="Nombre del responsable de entregar la produccion ">

                     <label for="idProducto">Codigo Producto</label>
                    <select required="required" class="form-control" id="idProductoU" name="idProductoU">
                       <?php
                        while ($copro = mysqli_fetch_array($pro)) {

                        ?>
                      <option value="<?php echo ($copro['idProducto']) ?>"><?php echo $copro['nombre'] ?></option>
                       <?php }?>
                    </select>   

                    <label for="cantidad">Cantidad  llegada </label>
                    <input class="form-control input-sm" id="cantidadU" name="cantidadU" type="number" placeholder="Cantidad de producto que entra ">

                    <label for="fechaVencimiento">Fecha vencimiento </label>
                    <input class="form-control input-sm" id="fechaVencimientoU" name="fechaVencimientoU" type="Date" placeholder="Nombre del responsable de entregar la produccion ">

                     <label for="valorUnitario">Valor Unitario</label>
                    <input class="form-control input-sm" id="valorUnitarioU" name="valorUnitarioU" type="number" placeholder="Escribe la fecha de produccion">

                    <label for="fechaEntrada">Fecha  entrada</label>
                    
                    <input class="form-control" id="fechaU" name="fechaU" type="Date" placeholder="Escribe la fecha en que ingresa el producto" readonly >

                    <script>
                        $(document).ready(  function(){
                                            var now = new Date();

                                            var day = ("0" + now.getDate()).slice(-2);
                                            var month = ("0" + (now.getMonth() + 1)).slice(-2);

                                            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

                                            $('#fechaU').val(today);
                                            })
                    </script>


                    

                    <label for="responsableRcibir"> Responsable recibir</label>
                    <input class="form-control" id="responsableRcibirU" name="responsableRcibirU" type="text" placeholder="Escribe el nombre del responsable de recibir">

                    <label for="horaEntrada"> Hora entrada </label>
                    <input class="form-control" id="horaEntradaU" name="horaEntradaU" type="times" placeholder="Escribe la hora en que la qu ingresa el producto " readonly>

                    <script>
                        $(document).ready( function mostrarhora(){
                                                 
                                                var cad = new Date().toLocaleTimeString();
                                                

                                            $('#horaEntradaU').val(cad);
                                            })
                    </script>

                    
                    <label for="cantidad">cantidad entrada</label>
                    <input class="form-control" name="cantidadEntrarU" id="cantidadEntrarU" type="number" placeholder="Escribe el Nombre">

      
                    <label for="valorTotal"> Valor total entrada </label>
                    <input class="form-control" id="valorTotalU" name="valorTotalU" type="number" placeholder="Escribe el Precio de Venta">

                    <label for="lote"> id lote  </label>
                    <input class="form-control" id="idLoteU" name="idLoteU" type="number" readonly>

                    <label for="loteProducto"> id lote producto </label>
                    <input class="form-control" id="idLoteProductoU" name="idLoteProductoU" type="number" readonly>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="button" onclick="validarActulizar()" id="btnActualizarEntrada" class="btn btn-primary">Actualizar</button>

                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>

</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaDatatable').load('productos/tablaEntrada.php');
    });
</script>

<script type="text/javascript">
    
        $('#btnAgregarEntrada').click(function() {

            if ( validarfor() == true) {
            datos=$('#addEntrada').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "productos/proceEntre/agregarEntre.php",
               success:function(r) {
                    if (r==1) {
                        $('#addEntrada')[0].reset();
                        
                        $('#tablaDatatable').load('productos/tablaEntrada.php');
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
    
    $('#btnActualizarEntrada').click(function() {
        if ( validarActulizar() == true) {
        datos=$('#acEntrada').serialize();

        $.ajax({
            type: "POST",
            data: datos,
            url: "productos/proceEntre/actualizarEntre.php",
            success: function(r) {
                if (r==1) {
                    $('#iddatatable').load('productos/tablaEntrada.php');
                    alertify.success("Actualizado con exito :D");
                } else {
                    alertify.error("Fallo al actualizar :(");
                }
                }
            });
        }else{
                 alertify.error("Los campos no pueden quedar vacios");
            }
        });

</script>
<script type="text/javascript">
    function agregaFrmActualizarEntra(idEntrada){
        $.ajax({
            type:"POST",
            data:"idEntrada=" + idEntrada,
            url:"productos/proceEntre/obtenEntre.php",
            success:function(r){
                datos=jQuery.parseJSON(r);
                $('#codigoLoteU').val(datos['codigoLote']);
                $('#responsableProduccionU').val(datos['responsableProduccion']);
                $('#fechaProduccionU').val(datos['fechaProduccion']);
                $('#idProductoU').val(datos['idProducto']);
                $('#cantidadU').val(datos['cantidad']);
                $('#fechaVencimientoU').val(datos['fechaVencimiento']);
                $('#valorUnitarioU').val(datos['valorUnitario']);
                $('#idEntradaU').val(datos['idEntrada']);
                $('#fechaU').val(datos['fecha']);
                $('#responsableRcibirU').val(datos['responsableRcibir']);
                $('#horaEntradaU').val(datos['horaEntrada']);
                $('#cantidadEntrarU').val(datos['cantidadEntrar']);
                $('#valorTotalU').val(datos['valorTotal']);
                $('#idLoteU').val(datos['idLote']);
                $('#idLoteProductoU').val(datos['idLoteProducto']);
            }
        });
    }
    </script>

    <script>
function validarfor(){

var codigoLote= document.getElementById("codigoLote").value; 
var responsableProduccion= document.getElementById("responsableProduccion").value;
var fechaProduccion = document.getElementById("fechaProduccion").value;
var cantidad = document.getElementById("cantidad").value;
var fechaVencimiento = document.getElementById("fechaVencimiento").value;
var idProducto= document.getElementById("idProducto").value;
var valorUnitario= document.getElementById("valorUnitario").value;
var responsableRcibir= document.getElementById("responsableRcibir").value;
var valorTotal = document.getElementById("valorTotal").value;
var cantidadEntrar = document.getElementById("cantidadEntrar").value;

if ((codigoLote == "") || (responsableProduccion == "") || (fechaProduccion == "") || (cantidad == "") || (fechaVencimiento == "") || (idProducto == "")|| (valorUnitario == "") || (responsableRcibir == "") || (cantidadEntrar =="") || (valorTotal == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
} else {
    return true;
}

}
  
    $(document).ready(iloteen);

    function iloteen(){
    $("#codigoLote").keyup(validar_coLote)
    $("#responsableProduccion").keyup(validar_responsablpro)
   $("#fechaVencimiento").keyup(esfechavalida)
   $("#cantidad").keyup(cantidad)
   $("#fechaProduccion").keyup(validar_fechaproduc)
   $("#idProducto").keyup(validar_codigoPro)
   $("#valorUnitario").keyup(validar_valorUnitario)
   $("#responsableRcibir").keyup(validar_responsablerecibir)
   $("#cantidadEntrar").keyup(validar_cantidadentrada)
   $("#valorTotal").keyup(validar_valortotal)
   
    
}
function validar_coLote() {
    var codigoLote= document.getElementById("codigoLote").value;

    if (codigoLote == null || codigoLote.length == 0 || /^\s+$/.test(codigoLote)) {
        var codigoLote = document.getElementById("codigoLote").style.border = "2px solid red";
        return false;
    } else {
        var codigoLote = document.getElementById("codigoLote").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsablpro() {
    var responsableProduccion= document.getElementById("responsableProduccion").value;

    if (responsableProduccion == null || responsableProduccion.length == 0 || /^\s+$/.test(responsableProduccion)) {
        var responsableProduccion = document.getElementById("responsableProduccion").style.border = "2px solid red";
        return false;
    } else {
        var responsableProduccion = document.getElementById("responsableProduccion").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_fechaproduc() {
      var fechaProduccion = document.getElementById("fechaProduccion").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaProduccion.length !== 10 ){
         error = true;
      }

      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaProduccion) ){
         error = true;
      }

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
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined ){            error = true;}

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;}
         if ( lyear === true && day > 29 ){
            error = true;}
      }

      if ( error === true ) {
         var fechaProduccion = document.getElementById("fechaProduccion").style.border = "2px solid #4caf50";
                
         return false;
      } else {
         var fechaProduccion = document.getElementById("fechaProduccion").style.border = "2px solid red";

      return true;
  }
}

   function esfechavalida() {

      var fechaVencimiento = document.getElementById("fechaVencimiento").value;
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaVencimiento) ){
         error = true;
      }

      // Mediante el delimitador "/" separa dia, mes y año
      var fechaVencimiento = fechaVencimiento.split("/");
      var day = parseInt(fechaVencimiento[0]);
      var month = parseInt(fechaVencimiento[1]);
      var year = parseInt(fechaVencimiento[2]);
      

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 ){
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;}

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;}

         if ( lyear === true && day > 29 ){
            error = true;}
      }

      if ( error === true ) {
       var fechaVencimiento = document.getElementById("fechaVencimiento").style.border = "2px solid #4caf50";     
         return false;
      } else {
         var fechaVencimiento = document.getElementById("fechaVencimiento").style.border = "2px solid red";
      

      return true;
   }
}

   function cantidad() {
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

function validar_valorUnitario() {
    var valorUnitario= document.getElementById("valorUnitario").value;

    if (valorUnitario == null || valorUnitario == 0) {
        var valorUnitario = document.getElementById("valorUnitario").style.border = "2px solid red";
        return false;
    } else {
        var valorUnitario = document.getElementById("valorUnitario").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsablerecibir() {
    var responsableRcibir= document.getElementById("responsableRcibir").value;

    if (responsableRcibir == null || responsableRcibir.length == 0 || /^\s+$/.test(responsableRcibir)) {
        var responsableRcibir = document.getElementById("responsableRcibir").style.border = "2px solid red";
        return false;
    } else {
        var responsableRcibir = document.getElementById("responsableRcibir").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_cantidadentrada() {
  var cantidadEntrar = document.getElementById("cantidadEntrar").value;

  var cantidadEntrar = this.value;
  this.value = cantidadEntrar.replace(/\D|\-/,'');


if ( isNaN(cantidadEntrar) ) {
    var cantidadEntrar = document.getElementById("cantidadEntrar").style.border = "2px solid red";
            
         return false;
      } else {
      
         
var cantidadEntrar = document.getElementById("cantidadEntrar").style.border = "2px solid #4caf50";
      return true;
   }
}


function validar_valortotal() {
  var valorTotal = document.getElementById("valorTotal").value;

  var valorTotal = this.value;
  this.value = valorTotal.replace(/\D|\-/,'');


if ( isNaN(valorTotal) ) {
    var valorTotal = document.getElementById("valorTotal").style.border = "2px solid red";
            
         return false;
      } else {
      
var valorTotal = document.getElementById("valorTotal").style.border = "2px solid #4caf50";
      return true;
   }
}

   ////////////////////////////////////////////////////////////////////////////////////////////

   function validarActulizar(){

var codigoLote= document.getElementById("codigoLoteU").value; 
var responsableProduccion= document.getElementById("responsableProduccionU").value;
var fechaProduccion = document.getElementById("fechaProduccionU").value;
var cantidad = document.getElementById("cantidadU").value;
var fechaVencimiento = document.getElementById("fechaVencimientoU").value;
var idProducto= document.getElementById("idProductoU").value;
var valorUnitario= document.getElementById("valorUnitarioU").value;
var responsableRcibir= document.getElementById("responsableRcibirU").value;
var valorTotal = document.getElementById("valorTotalU").value;
var cantidadEntrar = document.getElementById("cantidadEntrarU").value;

if ((codigoLote == "") || (responsableProduccion == "") || (fechaProduccion == "") || (cantidad == "") || (fechaVencimiento == "") || (idProducto == "")|| (valorUnitario == "") || (responsableRcibir == "") || (cantidadEntrar =="") || (valorTotal == "")) {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(iloteen);

    function iloteen(){
    $("#codigoLoteU").keyup(validar_coLote)
    $("#responsableProduccionU").keyup(validar_responsablpro)
   $("#fechaVencimientoU").keyup(esfechavalida)
   $("#cantidadU").keyup(cantidad)
   $("#fechaProduccionU").keyup(validar_fechaproduc)
   $("#idProductoU").keyup(validar_codigoPro)
   $("#valorUnitarioU").keyup(validar_valorUnitario)
   $("#responsableRcibirU").keyup(validar_responsablerecibir)
   $("#cantidadEntrarU").keyup(validar_cantidadentrada)
   $("#valorTotalU").keyup(validar_valortotal)
   
    
}
function validar_coLote() {
    var codigoLote= document.getElementById("codigoLoteU").value;

    if (codigoLote == null || codigoLote.length == 0 || /^\s+$/.test(codigoLote)) {
        var codigoLote = document.getElementById("codigoLoteU").style.border = "2px solid red";
        return false;
    } else {
        var codigoLote = document.getElementById("codigoLoteU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsablpro() {
    var responsableProduccion= document.getElementById("responsableProduccionU").value;

    if (responsableProduccion == null || responsableProduccion.length == 0 || /^\s+$/.test(responsableProduccion)) {
        var responsableProduccion = document.getElementById("responsableProduccionU").style.border = "2px solid red";
        return false;
    } else {
        var responsableProduccion = document.getElementById("responsableProduccionU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_fechaproduc() {
      var fechaProduccion = document.getElementById("fechaProduccionU").value;

      // La longitud de la fecha debe tener exactamente 10 caracteres
      if ( fechaProduccion.length !== 10 ){
         error = true;
      }

      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaProduccion) ){
         error = true;
      }

      // Mediante el delimitador "/" separa dia, mes y año
      var fechaProduccion = fechaProduccion.split("/");
      var day = parseInt(fechaProduccion[0]);
      var month = parseInt(fechaProduccion[1]);
      var year = parseInt(fechaProduccion[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 ){
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;}

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );

         if ( lyear === false && day >= 29 ){
            error = true;}
         if ( lyear === true && day > 29 ){
            error = true;}
      }

      if ( error === true ) {
         var fechaProduccion = document.getElementById("fechaProduccionU").style.border = "2px solid #4caf50";
                
         return false;
      }
      else
         var fechaVencimiento = document.getElementById("fechaProduccionU").style.border = "2px solid red";

      return true;
  }

   function esfechavalida() {

      var fechaVencimiento = document.getElementById("fechaVencimientoU").value;
      // Primero verifica el patron
      if ( !/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaVencimiento) ){
         error = true;
      }

      // Mediante el delimitador "/" separa dia, mes y año
      var fechaVencimiento = fechaVencimiento.split("/");
      var day = parseInt(fechaVencimiento[0]);
      var month = parseInt(fechaVencimiento[1]);
      var year = parseInt(fechaVencimiento[2]);

      // Verifica que dia, mes, año, solo sean numeros
      error = ( isNaN(day) || isNaN(month) || isNaN(year) );

      // Lista de dias en los meses, por defecto no es año bisiesto
      var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
      if ( month === 1 || month > 2 ){
         if ( day > ListofDays[month-1] || day < 0 || ListofDays[month-1] === undefined )
            error = true;}

      // Detecta si es año bisiesto y asigna a febrero 29 dias
      if ( month === 2 ) {
         var lyear = ( (!(year % 4) && year % 100) || !(year % 400) );
         if ( lyear === false && day >= 29 ){
            error = true;}
         if ( lyear === true && day > 29 ){
            error = true;}
      }

      if ( error === true ) {
       var fechaVencimiento = document.getElementById("fechaVencimientoU").style.border = "2px solid #4caf50";     
         return false;
      } else {
         var fechaVencimiento = document.getElementById("fechaVencimientoU").style.border = "2px solid red";

      return true;
   }
}

   function cantidad() {
  var cantidad = document.getElementById("cantidadU").value;

  var cantidad = this.value;
  this.value = cantidad.replace(/\D|\-/,'');


if ( isNaN(cantidad) ) {
    var cantidad = document.getElementById("cantidadU").style.border = "2px solid red";
            
         return false;
      } else {
         
var cantidad = document.getElementById("cantidadU").style.border = "2px solid #4caf50";
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

function validar_valorUnitario() {
    var valorUnitario= document.getElementById("valorUnitarioU").value;

    if (valorUnitario == null || valorUnitario == 0) {
        var valorUnitario = document.getElementById("valorUnitarioU").style.border = "2px solid red";
        return false;
    } else {
        var valorUnitario = document.getElementById("valorUnitarioU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_responsablerecibir() {
    var responsableRcibir= document.getElementById("responsableRcibirU").value;

    if (responsableRcibir == null || responsableRcibir.length == 0 || /^\s+$/.test(responsableRcibir)) {
        var responsableRcibir = document.getElementById("responsableRcibirU").style.border = "2px solid red";
        return false;
    } else {
        var responsableRcibir = document.getElementById("responsableRcibirU").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_cantidadentrada() {
  var cantidadEntrar = document.getElementById("cantidadEntrarU").value;

  var cantidadEntrar = this.value;
  this.value = cantidadEntrar.replace(/\D|\-/,'');


if ( isNaN(cantidadEntrar) ) {
    var cantidadEntrar = document.getElementById("cantidadEntrarU").style.border = "2px solid red";
            
         return false;
      } else{
var cantidadEntrar = document.getElementById("cantidadEntrarU").style.border = "2px solid #4caf50";
      return true;
   }
}

function validar_valortotal() {
  var valorTotal = document.getElementById("valorTotalU").value;

  var valorTotal = this.value;
  this.value = valorTotal.replace(/\D|\-/,'');


if ( isNaN(valorTotal) ) {
    var valorTotal = document.getElementById("valorTotalU").style.border = "2px solid red";
            
         return false;
      } else {
         
var valorTotal = document.getElementById("valorTotalU").style.border = "2px solid #4caf50";
      return true;
   }

}
</script>