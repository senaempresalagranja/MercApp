<?php
	include('session.php');
	if(isset($_POST['ss'])){
	$search = $_POST['name'];
	$query=mysqli_query($conn,"select * from `tbproducto` where nombre like '%$search%' limit 5");
	if(mysqli_num_rows($query)==0){
		
		?>
		<div style="position:relative; left:12px; top:10px;">Busqueda no encontrada</div></div>
		<?php
		
	}
	else{
		
		while ($row = mysqli_fetch_array($query)) {
		?>
 
			<div style="position:relative; left:12px; top:10px;">
				<a href="search_result.php?id=<?php echo $row['idProducto']; ?>"><?php echo $row['nombre']; ?></a><br><br>
			</div>
 
		<?php
		}
		
	}
}
?>