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
						Reporte Entrada
					</div>
					<div class="card-body">
						
                   
						
					<form method="post" class="form-horizontal">
                        <center><div class="row">
						<form id="fechas">
                            <div class="col-xs-12 col-sm-4">
                            <input class="form-control" type="date" id="fecha1" name="fecha1">
                            </div>
                            <div class="col-xs-12 col-sm-4">
                            <input class="form-control" type="date" id="fecha2" name="fecha2">
                            </div>
							<div class="col-xs-12 col-sm-4">
							<button type="button" class="btn btn-info icon-btn" id="consultarEntrada" onClick='enviar()'><i class="icon fa fa-search fa-fw"></i><span>Bucar</span></button>
							<button class="btn btn-success icon-btn" type="button" id="exportarExcel"><i class="icon fa fa-file-excel-o fa-fw"></i><span>Excel</span></button>
                            <button type="button" class="btn btn-danger icon-btn" id="generarPDF" onClick=''><i class="icon fa fa-file-pdf-o fa-fw"></i><span>PDF </span></button>
                            </div>
							</center>

			            </form>
                        
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

	


</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('Reportes/tablaReportePuntos.php');
	});
</script>

