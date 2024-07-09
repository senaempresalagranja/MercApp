<!DOCTYPE html>
<html lang="en">
<?php include("session.php");?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    
    <?php require_once "scripts.php";?>
    <title>Mercapp</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   

        <!--<link rel=”Shortcut Icon” href=”favicon.ico” type=”img/logomercapp.ico-icon” />-->

    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!--<link href="css/freelancer.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/freelancer.css">

  </head>
   
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-orange fixed-top text-uppercase" id="mainNav" style="background-color: orange;font-family: 'Montserrat'; height:90px">

     
      <div class="container">
      <a class="navbar-brand" href="#home"><img src="img/logomercapp.ico" style="width:70px;"/></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-green text-rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="background: #59b548;color: #fff;font-family: 'arial';">
          Menu
          <i class="fa fa-bars"></i>
        </button>
       <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1" style="margin-top: 2px;font-size: 10px;">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php" style="font-family: 'arial';">INICIO</a>
            </li>

            <li class="nav-item">
            </li>
            <li class="nav-item dropdown" style="margin-top: 10px;font-size: 10px">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'arial';">Añadir</a>
          
              <div class="dropdown-menu" >
              <a class="dropdown-item"  style="font-family: 'arial'; font-size: 10px" id="Area">Area</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial'; font-size: 10px" id="Unidad">Unidad</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial'; font-size: 10px" id="Medida">Unidad de Medida</a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial'; font-size: 10px;" id="Categoria">Categoria</a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="Producto">Producto</a>
             
               <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="Entrada">Entrada</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="Devolucion">Traslado</a>
              </div>
              
            </li>

             
              <li class="nav-item mx-0 mx-lg-1" style="margin-top: 2px;font-size: 10px;">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="Catalogo" style="font-family: 'arial';">Catalogo</a>
            </li>
             

            <li class="nav-item dropdown" style="margin-top: 10px;font-size: 10px">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'arial';" >Pedidos y Ventas</a>
          
              <div class="dropdown-menu">
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="Pedidos">Pedido</a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="Ventas">Venta</a>
             
              </div>
            </li>


                
              
             
              <li class="nav-item mx-0 mx-lg-1" style="margin-top: 2px;font-size: 10px;">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="Promocion" style="font-family: 'arial';">Promociones</a>
            </li>

             <li class="nav-item dropdown" style="margin-top: 10px;font-size: 10px">
             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'arial';" >REPORTES</a>
          
              <div class="dropdown-menu">
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="EntradaR">Reporte entrada</a>
            
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"  style="font-family: 'arial';font-size: 10px;" id="TrasladoR">Reporte Traslados Bajas </a>
             
              </div>
            </li>


            <li class="nav-item mx-0 mx-lg-1" style="margin-top: 2px;font-size: 10px;">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php" style="font-family: 'arial';" >Salir</a>
            </li>
               <!--<li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#PROMOCIONES">LOTE</a>
            </li>-->

          </ul>
        </div>
      </div>
    </nav>





    <Header>
    <header class="masthead bg-white text-black text-center">
      <div class="container" id="Contenedor">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/logomercapp.png" alt="">
       
    </header>

   



    <!-- Footer -->
    <footer class="footer text-center" style="font-family: 'arial';">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"style="padding: 20px;font-family: 'arial';">Centro</h4>
            <p class="lead mb-0">Agropecuario
              <br>la Granja Espinal-Tolima.</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"style="font-family: 'arial'; padding: 20px;">Sitio Web</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-google-plus"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fa fa-fw fa-twitter"></i>
                </a>
              </li>
            
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4"style="font-family: 'arial'; padding: 20px;">Mercapp</h4>
            <span> <img src="././img/logomercapp.ico" style="width: 100px;height: 100px; "></span>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white" style="font-family: 'chiller';">
      <div class="container">
        <small>Tecnova 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">

      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>


    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
   
   <script src="scripts.js"></script>
    <!-- Custom scripts for this template -->
    <!--<script src="js/freelancer.min.js"></script>-->
    <script>
    $(document).ready(function() {
      cargar_push();  
      setInterval(function() {
  cargar_push();  
},1000000);


});


    </script>

  </body>

</html>
