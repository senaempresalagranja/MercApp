 <div class="modal fade" id="addcustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Añadir Nuevo Cliente</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addcustomer.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nombre:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="nombrecliente" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Dirección:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="dircliente">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Datos de Contacto:</span>
                            <input type="text" style="width:400px;" class="form-control" name="contactocliente">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Nombre de Usuario:</span>
                            <input type="text" style="width:400px;" class="form-control" name="nombreuser" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Contraseña:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>  						
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->