<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Estado del Pedido</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Fecha de Solicitud </th>
								<th>Precio Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// "SELECT * from tbpedido where idCliente='".$_SESSION['id']."' and indicador = 3 or 2 order by fechaPedido desc");
							$h=mysqli_query($conn,"SELECT * from tbpedido INNER JOIN tbcliente ON tbcliente.Cliente=tbpedido.idCliente  where tbcliente.Cliente='".$_SESSION['id']."'order by fechaPedido desc");
							echo $_SESSION['id'];
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td><?php echo $hrow['fechaPedido']." ". $hrow['horaPedido'] ;?></td>
											<td><?php echo number_format($hrow['valorPedidoRealizado'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['idPedido']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Detalles del Pedido</a>
												<a href="#status<?php echo $hrow['idPedido']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Estado</a>
												<?php include ('modal_hist.php'); ?>
											</td>
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	
	
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	$('#history').addClass('active');
	
	$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7
	});
});
</script>
</body>
</html>