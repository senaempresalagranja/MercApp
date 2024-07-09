<!-- Navigation -->
        <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation" aria-expanded="false">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navegacion">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="index.php" >Mercapp</a>
            </div>
			 <div class="collapse navbar-collapse" id="navegacion">
			 
			<ul class=" nav navbar-nav">
				<li id="cartme" style="cursor:pointer">
                   <a id="cart_control"><i class="fa fa-shopping-cart fa-fw"></i> carrito</a>
                </li>
				<li id="history"><a href="history.php"><span class="fa fa-list-alt"></span> mis pedidos  </a></li>
					
			</ul>
			
			<ul class=" nav navbar-nav ">
				<li>
						<form class="navbar-form" role="search" method="POST" action="search_result2.php">
						<div class="input-group" id="searchbox" >
							<input type="text" class="form-control" placeholder="Buscar Producto" name="search" id="search">
							<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
						</form>
					</li>
			</ul>
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class=""></i> Categorias <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="index.php"> Todas las Categorias</a></li>
						<?php
							$caq=mysqli_query($conn,"select * from tbcategoria");
							while($catrow=mysqli_fetch_array($caq)){
								?>
								<li class="divider"></li>
								<li><a href="plist.php?cat=<?php echo $catrow['idCategoria']; ?>"><?php echo $catrow['nombre']; ?></a></li>
								<?php
							}
						
						?>

                    </ul> 
                </li> -->
                <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                 <span class="glyphicon glyphicon-user" style="color: black;"></span> usuarios <i class="fa fa-caret-down"></i>
             </a>
              <ul class="dropdown-menu" style="background-color: orange;">
                        <li><a href="cliente.php" style="background-color: green;color: white;"><span class=" fa fa-group"></span>  Clientes</a></li>
                    </ul>
                   
                </li> -->
               <!-- <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						 Promociones <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="#"> Muchas Promociones ;)</a></li>
				   </ul> 
                </li>
                <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						 Temporadas <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="#"> Muchas Temporadas ;)</a></li>
				   </ul> 
                </li>-->
                <!-- <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon  glyphicon-user" ></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						
						<li class="divider"></li>
						<li><a href="#profile" data-toggle="modal"> Mi Cuenta</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal">Salir</a></li>
                    </ul>   
                </li>
            </ul>
                        </div>
        </div>
        </nav>
        <div class="container">
      
        </div> -->


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php" >Mercapp</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <ul class=" nav navbar-nav">
				<li id="cartme" style="cursor:pointer">
                   <a id="cart_control"><i class="fa fa-shopping-cart fa-fw"></i> Carrito</a>
                </li>
				<li id="history"><a href="history.php"><span class="fa fa-list-alt"></span> Mis pedidos  </a></li>
				<li id="Promocion"><a href="search_result2.php"><span class="fa fa-certificate"></span> Promocion  </a></li>
					
			</ul>
			
			<ul class=" nav navbar-nav ">
				<li>
						<form class="navbar-form" role="search" method="POST" action="search_result2.php">
						<div class="input-group" id="searchbox" >
							<input type="text" class="form-control" placeholder="Buscar Producto" name="search" id="search">
							<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
						</form>
					</li>
            </ul>
            
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class=""></i> Categorias <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="index.php"> Todas las Categorias</a></li>
						<?php
							$caq=mysqli_query($conn,"select * from tbcategoria");
							while($catrow=mysqli_fetch_array($caq)){
								?>
								<li class="divider"></li>
								<li><a href="plist.php?cat=<?php echo $catrow['idCategoria']; ?>"><?php echo $catrow['nombre']; ?></a></li>
								<?php
							}
						
						?>

                    </ul> 
                </li>
      <li class="dropdown" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon  glyphicon-user" ></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						
						<li class="divider"></li>
						<li><a href="#profile" data-toggle="modal"> Mi Cuenta</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal">Salir</a></li>
                    </ul>   
                </li>

      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
<?php include('cart_search_field.php');?>
</div>
