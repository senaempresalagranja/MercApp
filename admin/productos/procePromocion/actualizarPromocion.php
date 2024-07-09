<?php
require_once "../clases/conexion.php";
require_once "../crudPromocion/crudPromocion.php";
$obj = new crudPromocion();

$foto = $_FILES['imgU'];
if ($foto["type"] == "image/jpg" OR $foto["type"] == "image/jpeg"){
    $ruta = "../imagenes/". $foto["name"];
    if (move_uploaded_file($foto["tmp_name"],  $ruta)) {
      
   $fotoNom= $foto["name"];
}
}

$datos = array(
    $_POST['idPromocionU'],
    $_POST['fechaInicioU'],
    $_POST['fechaFinU'],
    $_POST['idProductoU'],
    $_POST['valorActualU'],
    $_POST['valorPromocionU'],
    $_POST['cantidadU'],
    $foto["name"]
    );

echo $obj-> actualizarPromocion($datos);
?>
