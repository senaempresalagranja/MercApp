
<html lang="en">

   <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<meta http-equiv="x-ua-compatible" content="ie=edge">-->

        <title>MERCAPP</title>

        <!-- Font Awesome -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,600,300,300italic,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Material Design Bootstrap -->
        <link href="css1/materialize.css" rel="stylesheet">

        <!-- Magnific-popup css -->
        <link href="css1/magnific-popup.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link href="css1/bootstrap.min.css" rel="stylesheet">

        <!-- Material Design Bootstrap -->
        <!--<link href="css/progressbar.css" rel="stylesheet">-->

        <!-- Material Design Bootstrap -->
        <link href="css1/mdb.min.css" rel="stylesheet">
        
        


        <!-- nuestros estilos propios (optional) -->
        <link href="css1/style.css" rel="stylesheet">
        <link href="css1/responsive.css" rel="stylesheet">
        
        <style>
            #pie{
                background-color: black;
            }
        
        </style>

    </head>

    <body data-spy="scroll" >
        <!-- comienzo de nuestro proyecto-->
        <!--Navbar-->

        <div class='preloader'><div class='loaded' >&nbsp;</div></div> -->

        <nav class="navbar navbar-fixed-top navbar-light bg-faded" style="background-color: orange; width: 100%; height: 90px;">
            <!--boton de el menu colapsado es decir cuando el nav es en formato mobile-->
             

            <div class="container">
                <a href="#" data-activates="mobile-menu" class="button-collapse right"><i class="fa fa-bars black-text"></i></a>
               
                <!--contenido para pantallas grandes y pequeñas-->
                <div class="navbar-desktop" >
                    <!--Navbar marca-->
                    <a class="navbar-brand" href="#home"><img src="user/logomercapp.png" alt=""/></a>
                    <!--enlaces-->
                    <ul class="nav navbar-nav pull-right hidden-md-down" style="margin-top: 30;">
                        <li class="nav-item">
                            <a class="nav-link" href="#home"><span class="fa fa-home"> Inicio<span class="sr-only">(current)</span></span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="user/index2.php"> <span class="fa fa-qrcode"> Catalogo</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#service"><span class="fa fa-cog"> Servicios</span></a>
                        </li>
                     <!--   <li class="nav-item">
                            <a class="nav-link" href="#team">Team</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="catalogo.html"><span class="fa fa-book"> Catalogo</span></a>
                        </li> -->
                       <!--  <li class="nav-item">
                            <a class="nav-link" href="#contacto"><span class="fa fa-phone"> Contactenos</span></a>
                        </li> -->
                          <li class="nav-item">
                             <a class="nav-link" href="ingreso.php"><span class="fa fa-sign-out">Ingresar</span></a>
                        </li>
                        
                    </ul>
                    
               </div>

                <!-- Contenido para el nav en pantallas pequeñas-->
                <div class="navbar-mobile">

                    <ul class="side-nav" id="mobile-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="#home"><span class="fa fa-home"> Inicio<span class="sr-only">(current)</span></span></a>
                        </li>
                       <!--  <li class="nav-item">
                            <a class="nav-link" href="#about"><span class="fa fa-users"> Quienes somos</span></a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="#service"><span class="fa fa-cog"> Servicios</span></a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="user/index2.php"><span class="fa fa-book"> Catalogo</span></a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="#!"><span class="fa fa-phone"> Contactenos</span></a>
                        </li> -->
                      <li class="nav-item">
                            <a class="nav-link" href="ingreso.php"><span class="fa fa-sign-out">Ingresar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#!"><i class="fa fa-search fa-lg"></i></a>
                        </li>
                     </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->


       
            
       



      

 
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_about_area">
                            <div class="head_title center m-y-3 wow fadeInUp">
                                
                            </div>

                            <div class="main_about_content">
                                <div class="row">
                                    <div class="col-md-6">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
           
            <br/>
            <br/>
            
        </section>
        <section id="home" class="home">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_about_area">
                              <div class="single_team white-text m-t-2 wow zoomIn">
                                            
                    

          
                
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </section>

        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_about_area">

                         
  <div class="head_title center m-y-3 wow fadeInUp">
                                <h2 style="text-align: center;font-family:Georgia,Arial,Sans-serif;font-size: 80px;color:orange;margin-bottom: 80px;" >MercApp</h2>
                                


        <?php include('conn.php'); ?>


    
    <div style="height: 80px;"></div>
    <div >
    <?php
        $inc=4;
        $query=mysqli_query($conn,"SELECT * from tbproducto WHERE indicador = 1");
        $control= mysqli_num_rows($query);
         if ($control == 0) {
        ?>
             <header class="masthead bg-white text-black text-center">
             <div class ="container  col-lg-12 ">
    <h2 class='item'>"No hay productos Disponibles en este momento"</h2>
</div>
      <div class="container" id="Contenedor">
        <img class="img-fluid mb-5 d-block mx-auto" src="logomercapp.png" alt="">
        
        
    </header> 



        <?php   
         }
         $control2=0;
        while($row=mysqli_fetch_array($query)){
            
            if ($row['existencia'] > 0) {
                # code...
            
            $inc = ($inc == 4) ? 1 : $inc+1; 
            if($inc == 1) echo "<div class='row'>";  
            $control2 = 1;
            ?>
                <div class="col-lg-3 col-sm-6  col-xs-12 col-md-3 item" id="item">
                <div class="item">
                    <img src="./admin/productos/imagenes/<?php if (empty($row['foto'])){echo "upload/noimage.jpg";}else{echo $row['foto'];} ?>" style="width: 230px; height:230px; padding:auto; margin:auto;" class="thumbnail">
                    <div style="height: 10px;"></div>
                    <div style="margin-left:17px; margin-right:17px;">
                    <div style="height:40px;  margin-left:17px;"><?php echo $row['nombre']; ?><div class="pull-right" style="height:40px;  margin-left:17px;">existencias: <?php echo $row['existencia']; ?></div></div>
                    </div>
                    
                    <div style="margin-left:17px; margin-right:17px;">
                        <strong><?php echo number_format($row['precioVenta'],2); ?></strong> 
                        
                    </div>

                             <a class="nav-link" style="color: black;" href="ingreso.php"><span class="fa fa-cart-arrow-down">Añadir</span></a>
                                      </div>
                </div>
            <?php
        if($inc == 4) echo "</div><div style='height: 30px;'></div>";
        
    }   
    }

        if($inc == 1) echo "<div class='col-lg-3></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
        if($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
        if($inc == 3) echo "<div class='col-lg-3'></div></div>"; 
        if($control2 == 0) {
            ?>
                 <header class="masthead bg-white text-black text-center">
                 <div class ="container  col-lg-12">
    </div>
          <div class="container" id="Contenedor">
            <img class="img-fluid mb-5 d-block mx-auto" src="logomercapp.png" alt="">
            
            
        </header>
    
    
    
            <?php   
            }
        
            

    ?>
    </div>
</div>
<div id="promocion"></div>
<?php include('script.php'); ?>

<script src="user/custom.js"></script>
<!-- promociones -->
<script src="user/ntf.js"></script>



        <section id="service" class="service">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_service_area">
                            <div class="head_title center m-y-3 wow fadeInUp">
                                <h2></h2>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="jumbotron single_service  wow fadeInLeft">
                                        <div class="service_icon center">
                                            <i class="fa fa-cog m-b-3"></i>
                                        </div>
                                        <div class="s_service_text text-sm-center text-xs-center">
                                            <h4>OBJETIVO DEL SISTEMA</h4>
                                            <p>Diseñar e implementar un sistema operativo hibbrido nativo web con el fin de ayudar a la gestion
                                                de el inventario de los productos que se comercializan en mercasena
                                                </p>
                                        </div>

                                      
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="jumbotron single_service wow fadeInUp">
                                        <div class="service_icon center">
                                            <i class="fa fa-pied-piper m-b-3"></i>
                                        </div>
                                        <div class="s_service_text text-sm-center text-xs-center">
                                            <h4>FUNCIONALIDAD</h4>
                                            <p>Mercapp va a ser una herramienta virtual para que tanto usuarios clientes y administrador tenga un pleno conocimiento en los productos que se comercializan en mercasena</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="jumbotron single_service wow fadeInRight">
                                        <div class="service_icon center">
                                            <i class="fa fa-sign-out m-b-3"></i>
                                        </div>
                                        <div class="s_service_text text-sm-center  text-xs-center">
                                            <h4>ALCANCE</h4>
                                            <p>Se pretende llevar a Mercapp a un contexto mayor es decir queremos 
                                                en un futuro poder comercializar este proyecto para que asi nos puedan conocer en el mercado
                                             </p> 

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </section> 

       
     



       
        <!-- /Start your project here-->


        <!-- SCRIPTS -->

        <!-- JQuery -->
        <script type="text/javascript" src="js1/jquery-2.2.3.min.js"></script>

        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js1/tether.min.js"></script>


        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js1/bootstrap.min.js"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js1/mdb.min.js"></script>

        <!-- Wow js -->
        <script type="text/javascript" src="js1/wow.min.js"></script>

        <!-- Mixitup js -->
        <script type="text/javascript" src="js1/jquery.mixitup.min.js"></script>

        <!-- Magnific-popup js -->
        <script type="text/javascript" src="js1/jquery.magnific-popup.js"></script>

        <!-- accordion js -->
        <script type="text/javascript" src="js1/accordion.js"></script>

        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js1/materialize.js"></script>

        <script>
            $(".button-collapse").sideNav();
        </script>

        <!-- wow js active -->
        <script type="text/javascript">
            new WOW().init();
        </script>

        <script type="text/javascript" src="js1/plugins.js"></script>
        <script type="text/javascript" src="js1/main.js"></script>


    </body>

</html>