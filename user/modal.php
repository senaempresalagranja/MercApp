<!-- Logout -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Estas seguro que deseas salir</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <h5><center>Usuario: <strong><?php echo $user; ?></strong></center></h5> 
                </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <a href="logout.php" class="btn btn-success"><i class="fa fa-sign-out"></i> Salir</a>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->
  

<!-- My Account -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Mi Cuenta</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="update_account.php">
						<div style="height:10px;"></div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">User:</span>
							<input type="text" style="width:350px;" value="<?php echo $srow['cuenta']; ?>" class="form-control" name="username">
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Contraseña:</span>
							<input type="password" style="width:350px;" value="<?php echo $srow['password']; ?>" class="form-control" name="password">
						</div><hr>
						<p>Digite los siguientes campos si desea modificar la contraseña:</p>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Contraseña:</span>
							<input type="password" style="width:350px;" class="form-control" name="cpass" required>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon" style="width:150px;">Confirmar Contraseña:</span>
							<input type="password" style="width:350px;" class="form-control" name="repass" required>
						</div> 						
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Modificar</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Edit Profile -->
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php
		$cq=mysqli_query($conn,"select * from customer left join `user` on user.idusuario=customer.idusuario where customer.idusuario='".$_SESSION['id']."'");
		$crow=mysqli_fetch_array($cq);
	?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Registrarse</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="save_profile.php<?php echo '?id='.$_SESSION['id']; ?>" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Nombres:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="cname" value="<?php echo ucwords($crow['nombre_cliente']); ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Apellidos:</span>
                            <input type="text" style="width:330px;" class="form-control">
                        </div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Dirección:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="address" value="<?php echo ucwords($crow['direccion']); ?>">
                        </div>
						<div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Telefono:</span>
                            <input type="text" style="width:330px;" class="form-control" name="contact" value="<?php echo $crow['contact']; ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Correo:</span>
                            <input type="text" style="width:330px;" class="form-control">
                        </div>
                        
						</div>
				</div>                
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Aceptar</button>
					</form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->