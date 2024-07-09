<?php
	include('session.php');
	$uid=$_GET['id'];

	$name= $_POST['cname'];
	$address= $_POST['address'];
	$contact= $_POST['contact'];
	
	mysqli_query($conn,"update customer set  nombre_cliente='$name',  direccion='$address', contact='$contact' where idusuario='$uid'");
	
	?>
		<script>
			window.alert('Perfil Actualizado Con Exito!');
			window.history.back();
		</script>
	<?php
	
?>