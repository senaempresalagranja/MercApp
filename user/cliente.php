<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Clientes
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addcustomer"><i class="fa fa-plus-circle"></i> Agregar Clientes</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                <thead>
                    <tr>
                        <th>Nombre del Cliente</th>
                        <th>Nombre de Usuario</th>
                        <th>Contraseña</th>
						<th>Dirección</th>
                        <th>Datos de Contacto</th>
						<th>Acción	</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$coneccliente=mysqli_query($conn,"select * from tbcliente left join tbusuario on tbusuario.idusuario=tbcliente.idusuario");
					while($columnacliente=mysqli_fetch_array($coneccliente)){
					?>
						<tr>
							<td><?php echo $columnacliente['nombre']; ?></td>
							<td><?php echo $columnacliente['cuenta']; ?></td>
							<td>*****</td>
							<td><?php echo $columnacliente['direccion']; ?></td>
							<td><?php echo $columnacliente['contact']; ?></td>
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $columnacliente['idusuario']; ?>"><i class="fa fa-edit"></i> Editar</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $columnacliente['idusuario']; ?>"><i class="fa fa-trash"></i> Borrar</button>
								<?php include('boton_usuario.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="cliente1.js"></script>
</body>
</html>