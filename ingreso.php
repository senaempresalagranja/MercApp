<?php include('header.php'); ?>


<body style="background-color: orange;">
<div class="container" id="for">
	<div id="login_form" class="well" style="border: 2px solid green;">
		<h2><center><span class="glyphicon glyphicon-lock" style="color: green;"></span> INGRESAR</center></h2>
		<hr>
		<form role="form" method="POST" action="login.php" id="formentrar">
		Documento: <input type="text" name="cuenta" id="cuenta" class="form-control" placeholder="Ingresa el numero de tu documento" required>
		<div style="height: 10px;"></div>		
		Contraseña: <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingresa tu contraseña" required> 
      
		<button type="submit"  class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Entrar</button>

		
<!--<a href="user/cliente.php" class="btn btn-success btn-sm">¿Registrarse?</a>-->

	<!--<a
	href="user/cliente.php"
	onclick="return confirm('Hola Desea Ingresar con:\n' + this.href)">
	...
</a>-->
			<span class="btn btn-green" data-toggle="modal" data-target="#addcustomer">
						Registrarse <span class="fa fa-plus-circle"></span>
						</span>
			
		</form>

		

						 <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <center><h4 class="modal-title">Añadir Nuevo Cliente</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">

                    <form id="añadirCliente" method="POST">

						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nombres:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="nombrecliente" id="nombrecliente" placeholder="Escribe tus nombres" required>
                        </div>

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Telefono:</span>
                            <input type="number"  class="form-control" name="telefono" id="telefono" placeholder="Escribe tu numero de telefono">
                        </div>

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">E-mail</span>
                            <input type="text" style="width:400px;" class="form-control" name="email" id="email" placeholder="Escribe tu correo electronico">
                        </div>

                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Tipo cliente </span>
                             <select required="required" class="form-control" id="tipocliente" name="tipocliente" onchange="return validar_tipocliente()">
                             	<option  disabled selected>Seleciona el tipo de cliente </option>
                             	<option>Funcionario</option>
                             	<option>Aprendiz</option>
                             	<option>Instructor</option>
                             	<option>Contratista</option>
                             	<option>Visitante</option>


                           ></select>
                        </div>


                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Documento:</span>
                            <input type="number"  class="form-control" name="cuentas" id="cuentas"  placeholder="Ingrese su documento de identificacion" required>
                        </div>

						
						
						
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contraseña:</span>
                            <input type="password" style="width:400px;" class="form-control" name="contrasenas" id="contrasenas" required>
                        </div>  						
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="button" id="btnagregarGuardar" onclick="ingreso()" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->

		<div style="height: 15px;"></div>
		
	</div>
</div>
<?php include('script.php'); ?>
</body>
</html>


<script type="text/javascript">
   $(document).ready(function() {
        $('#btnagregarGuardar').click(function() {
          if (ingreso() == true) {
            datos=$('#añadirCliente').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "user/addcustomer.php",
                success: function(r) {
                if (r==1) {
                  back("ingreso.php");
                    alert("Agregado con exito");

                } else {
                    alert("Fallo al Agregar");
                }
                }
         
  
         
    });
            }else{
              alert("Los campos no deben quedar vacios");
          }
          
});
    });




</script>

<script >
    $(document).ready(inicio);

  function inicio() {

// $("#cuenta").keyup(validar_usuario);
$("#contrasena").keyup(validar_contraseña);

  }

function validar_contraseña() {
   var contraseña=document.getElementById('contrasena').value;
      if(contraseña==null  || contraseña.length==0){
  var contraseña=document.getElementById('contrasena').style.border="2px solid red"
        return false;

      }else if (contraseña.length>50) {
var contraseña=document.getElementById('contrasena').style.border="2px solid red"
        return false;

      } else{
var contraseña=document.getElementById('contrasena').style.border="2px solid green"

      return true;
      } 

}
// function validar_usuario() {
   
//          var usuario=document.getElementById('cuenta').value;
//       if(usuario==null  || usuario.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(usuario)){
//   var usuario=document.getElementById('cuenta').style.border="2px solid red"
//         return false;

//       }else if (usuario.length<11) {
// var usuario=document.getElementById('cuenta').style.border="2px solid red"
//         return false;

//       } else{
// var usuario=document.getElementById('cuenta').style.border="2px solid green"

//       return true;
//       } 

//   }
</script>

<script>
    function ingreso(){

var nombre= document.getElementById("nombrecliente").value;
var telefono= document.getElementById("telefono").value;
var email= document.getElementById("email").value;
var tipocliente= document.getElementById("tipocliente").value;
var documento= document.getElementById("cuentas").value;
var contrasena= document.getElementById("contrasenas").value;



if (nombre == "" || telefono == "" || email == "" || tipocliente == "" || documento == "" || contrasena == "") {  //COMPRUEBA CAMPOS VACIOS
   
    return false;
}else {
    return true;
}

}
  
    $(document).ready(agrega);

    function agrega(){
   
    $("#nombrecliente").keyup(validar_nombre)
    $("#telefono").keyup(validar_telefono)
    $("#email").keyup(validar_email)
    $("#tipocliente").keyup(validar_tipocliente)
    $("#cuentas").keyup(validar_documento)
    $("#contrasenas").keyup(validar_contrasena)
     
}


  function validar_nombre() {
    var nombre= document.getElementById("nombrecliente").value;

    if (nombre == null || nombre == 0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(nombre)) {
        var nombre = document.getElementById("nombrecliente").style.border = "2px solid red";
        return false;
    } else {
        var nombre = document.getElementById("nombrecliente").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_telefono() {
   
         var telefono=document.getElementById('telefono').value;
      if(telefono==null  || telefono.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(telefono)){
  var telefono=document.getElementById('telefono').style.border="2px solid red"
        return false;

      }else if (telefono.length<10) {
var telefono=document.getElementById('telefono').style.border="2px solid red"
        return false;

      } else{
var telefono=document.getElementById('telefono').style.border="2px solid green"

      return true;
      } 

  }
  function validar_email() {
    var email= document.getElementById("email").value;

    if (email == null || email == 0 ||  /[¿!"#$%&/()=?¡'{}_+´´*;:,']/.test(email)) {
        var email = document.getElementById("email").style.border = "2px solid red";
        return false;
    } else {
        var email = document.getElementById("email").style.border = "2px solid #4caf50";
        return true;
    }
}

function validar_tipocliente() {
    var tipocliente= document.getElementById("tipocliente").value;

    if (tipocliente == null || tipocliente == 0) {
        var tipocliente = document.getElementById("tipocliente").style.border = "2px solid red";
        return false;
    } else {
        var tipocliente = document.getElementById("tipocliente").style.border = "2px solid #4caf50";
        return true;
    }
}
function validar_documento() {
   
         var documento=document.getElementById('cuentas').value;
      if(documento==null  || documento.length==0 || /[¿!"#$%&/()=?¡'{}_+´´*;:.,']/.test(documento)){
  var documento=document.getElementById('cuentas').style.border="2px solid red"
        return false;

      }else if (documento.length<7) {
var documento=document.getElementById('cuentas').style.border="2px solid red"
        return false;

      } else{
var documento=document.getElementById('cuentas').style.border="2px solid green"

      return true;
      } 

  }
  function validar_contrasena() {
   var contrasena=document.getElementById('contrasenas').value;
      if(contrasena==null  || contrasena.length==0){
  var contrasena=document.getElementById('contrasenas').style.border="2px solid red"
        return false;

      }else if (contrasena.length>50) {
var contrasena=document.getElementById('contrasenas').style.border="2px solid red"
        return false;

      } else{
var contrasena=document.getElementById('contrasenas').style.border="2px solid green"

      return true;
      } 

}

</script>


