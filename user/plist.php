<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php $cat=$_GET['cat']; ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 80px;"></div>
	<div>
	<?php
		$inc=4;
		$query=mysqli_query($conn,"select * from tbproducto where idcategoria='$cat'");
		while($row=mysqli_fetch_array($query)){
			
			$inc = ($inc == 4) ? 1 : $inc+1; 
			if($inc == 1) echo "<div class='row'>";  
			
			?>
				<div class="col-lg-3 col-sm-6  col-xs-12 col-md-3 item" id="item">
				<div class="item">
					<img src="../admin/productos/imagenes/<?php if (empty($row['foto'])){echo "upload/noimage.jpg";}else{echo $row['foto'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
					<div style="height: 10px;"></div>
					<div style="margin-left:17px; margin-right:17px;">
					<div style="height:40px;  margin-left:17px;"><?php echo $row['nombre']; ?><div class="pull-right" style="height:40px;  margin-left:17px;">existencias: <?php echo $row['existencia']; ?></div></div>
					</div>
					<div style="height: 10px;"></div>
					<div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['idProducto']; ?>">Cantidad: <input type="text" style="width:40px;" id="qty<?php echo $row['idProducto']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
					<div style="margin-left:17px; margin-right:17px;">
						<button type="button" class="btn btn-primary btn-sm addcart" value="<?php echo $row['idProducto']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> Agregar</button> <span class="pull-right"><strong id="vlru<?php echo $row['idProducto']; ?>"><?php echo number_format($row['precioVenta'],2); ?></strong></span> 
						
					</div>
				</div>
				</div>
			<?php
		if($inc == 4) echo "</div><div style='height: 30px;'></div>";
		}
		if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
		if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
	?>
	</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
</body>
</html>