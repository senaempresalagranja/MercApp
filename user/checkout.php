<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div class="container">
	<div style="height:50px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> Cancelar Pedido</a>
		</div>
	</div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>
	
	<div style="height:20px;"></div>
	<div class="row">
		<button type="button"  class="btn btn-primary pull-right" data-toggle="modal" data-target="#agregarPedido" style="margin-right:15px;"><i class="fa fa-check fa-fw"></i> Solicitar Pedido</button>
	</div>
</div>
<?php include('script.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	showCheckout();
	
});
</script>
<!-- Modal -->
<div class="modal fade" id="agregarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Descripcion De el pedido</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo" method="post">
						<label>Lugar de Pedido</label>
						<input type="text" class="form-control " id="lugar" placeholder="Eje: Ambiente B2">
						<label>Hora Pedido</label>
						<input type="time" id="horaEntregaPedido" class="form-control" >
											
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="check" class="btn btn-success " onclick="enviar()">Enviar</button>
				</div>
			</div>
		</div>
	</div>

	
<div id="contenedor"></div>
</body>
</html>
<script type="text/javascript">
	function enviar(){
		
	
		var total=$('#total').text();
		
		var lugar= $('#lugar').val();
		
		var hora= $('#horaEntregaPedido').val();


	$("#contenedor").load("confirm_check.php",{total:total,lugar:lugar,hora:hora});
		// if (total < 0) {
		// 	alert("4");
		// 	$.ajax({
		// 		url:"confirm_check.php",
		// 		method:"POST",
		// 		data: {
		// 			total:total,
		// 			lugar:lugar,
		// 			hora:hora,
					
		// 		},
		// 		success:function(r){
		// 			window.location.replace('history.php')
					
		// 		}
		// 	});
		// }
	}

	

</script>