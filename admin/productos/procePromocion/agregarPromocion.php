<?php
require_once "../clases/conexion.php";
require_once "../crudPromocion/crudPromocion.php";
$obj = new crudPromocion();

$img = $_FILES['img'];
if ($img["type"] == "image/jpg" OR $img["type"] == "image/jpeg" OR $img["type"] == "image/png"){
    $ruta = "../imagenes/". $img["name"];
    if (move_uploaded_file($img["tmp_name"],  $ruta)) {
      
   $fotoNom= $img["name"];
$datos = array(
    $_POST['fechaInicio'],
    $_POST['fechaFin'],
    $_POST['idProducto'],
    $_POST['valorActual'],
    $_POST['valorPromocion'],
    $_POST['cantidad'],
    $img["name"]
	);

echo $obj ->agregarPromocion($datos);
    }
}