<?php
require_once "../clases/conexion.php";
require_once "../clases/crud.php";
$obj = new crud();

$foto = $_FILES['foto'];
if ($foto["type"] == "image/jpg" OR $foto["type"] == "image/jpeg" OR $foto["type"] == "image/png"){
    $ruta = "../imagenes/". $foto["name"];
    if (move_uploaded_file($foto["tmp_name"],  $ruta)) {
      
   $fotoNom= $foto["name"];

$datos = array(
    $_POST['idProducto'],
    $_POST['codigoBarras'],
    $_POST['nombre'],
    $_POST['idUnidadMedida'],
    $_POST['idCategoria'],
    $_POST['idUnidad'],
    $_POST['presentacion'],
    $_POST['precioVenta'],
    $_POST['existencia'],
    $foto["name"],
    $_POST['elemento']
    );



echo $obj->agregar($datos);
  }
}