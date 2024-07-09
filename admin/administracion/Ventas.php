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
	
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('administracion/tablaVentas.php');
	});
</script>

