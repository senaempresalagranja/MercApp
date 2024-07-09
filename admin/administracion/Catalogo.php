<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						Ventas
					</div>
					<div class="card-body">
						
						
					
						<div id="tablaDatatable"></div>
						</div>
					
					<center><div class="card-footer text-muted">
						MercApp - TecNova 
					</div></center>
				</div>
			</div>
		</div>
	</div>

</body>
</html>


<script type="text/javascript">
	function activar($idProducto){
			

			$.ajax({
				url:"administracion/procesos/activar.php",
				method:"POST",
				data:"idProducto="+$idProducto,
				
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('administracion/cuerpoCatalogo.php');
						alertify.success("Activado con exito :D");
					}else{
						alertify.error("Fallo al Activar :(");
					}
				}
			});
		}
		function desactivar($idProducto){
			

			$.ajax({
				url:"administracion/procesos/desactivar.php",
				method:"POST",
				data:"idProducto="+$idProducto,
				
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('administracion/cuerpoCatalogo.php');
						alertify.success("Desactivado con exito :D");
					}else{
						alertify.error("Fallo al Desactivar :(");
					}
				}
			});
		}	
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('administracion/cuerpoCatalogo.php');
	});
</script>

