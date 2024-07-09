<!-- History -->
    <div class="modal fade" id="detail<?php echo $hrow['idPedido']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Detalles del Pedido</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from tbPedido where idPedido='".$hrow['idPedido']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-right">Fecha: <?php echo date("F d, Y", strtotime($srow['fechaPedido'])); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Nombre del Producto</th>
										<th>Precio de Venta</th>
										<th>Cantidad</th>
										<th>SubTotal</th>
										
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from tbPedidoProducto  inner join tbproducto on tbproducto.idProducto =tbpedidoproducto.idProducto where idPedido='".$hrow['idPedido']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['nombre']); ?></td>
												<td align="right"><?php echo number_format($pdrow['precioVenta'],2); ?></td>
												<td><?php echo $pdrow['cantidadEntregada']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['valorTotalEntregado'];
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="status<?php echo $hrow['idPedido']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Estado del Pedido</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from tbPedido where idPedido='".$hrow['idPedido']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-right">Fecha: <?php echo date("F d, Y", strtotime($srow['fechaPedido'])); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Estado de el Pedido</th>
										<?php 
										if ($srow['indicador']==1) {
											echo"<th> <div class=''><span class='glyphicon glyphicon glyphicon-option-horizontal'></span> En espera</div></th>";
										}elseif ($srow['indicador']==2) {
											echo"<th> <div class=''><span class='glyphicon glyphicon-check'></span>Confirmado </div></th>";
										}elseif ($srow['indicador']==3) {
											echo"<th> <div class=''><span class='glyphicon glyphicon glyphicon-share'></span>Despachado </div></th>";
										}
										?>
										
										
										
									</tr>
								</thead>
								
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
