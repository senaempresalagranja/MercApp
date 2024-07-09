<?php
require_once "../clases/conexion.php";
require_once "../clases/crud.php";
$obj = new crud();

$foto = $_FILES['fotoU'];
if ($foto["type"] == "image/jpg" OR $foto["type"] == "image/jpeg"){
    $ruta = "../imagenes/". $foto["name"];
    if (move_uploaded_file($foto["tmp_name"],  $ruta)) {
      
   $fotoNom= $foto["name"];
 }
}
$datos = array(
    $_POST['idProductoU'],
    $_POST['codigoBarrasU'],
    $_POST['nombreU'],
    $_POST['idUnidadMedidaU'],
    $_POST['idCategoriaU'],
    $_POST['idUnidadU'],
    $_POST['presentacionU'],
    $_POST['precioVentaU'],
    $_POST['existenciaU'],
    $foto["name"],
    $_POST['elementoU']
);

echo $obj->actualizar($datos);
