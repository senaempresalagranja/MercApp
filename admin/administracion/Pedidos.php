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
						Pedidos
					</div>
					<div class="card-body">
						
						
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

</body>
</html>


<script type="text/javascript">
	
	function name(params) {
		
	}

		function confirmar($idPedido){
			

			$.ajax({
				type:"POST",
				data: "idPedido="+$idPedido,
				url:"administracion/procesos/confirmar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('administracion/tabla.php');
						alertify.success("Confitmado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		}
		function despachar($idPedido){
			

			$.ajax({
				url:"administracion/procesos/despachar.php",
				method:"POST",
				data:"idPedido="+$idPedido,
				
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('administracion/tabla.php');
						alertify.success("Confitmado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		}
		function detalle($idPedido) {
		
		$('#modal').load('administracion/detalle.php?idPedido='+$idPedido);
		$('')				
				
		}
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('administracion/tabla.php');
	});
// 	$(".cerrarModal").click(function(){
// 		$(function() { 
//     $('#modal').modal(toggle) 
// });
// });
</script>
 <div id="modal"></div>
