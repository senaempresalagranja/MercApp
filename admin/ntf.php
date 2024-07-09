<?php
require_once "class/conexion.php";

set_time_limit(0);
$fecha_ac =isset($_POST['timestamp']) ? $_POST['timestamp'] : 0;

$fecha_db = $row[0];

while ($fecha_db <= $fecha_ac) {
   $query2= "SELECT timestramp FROM  tbpedido ORDER BY timestramp DESC LIMIT 1";
   $sql= mysqli_query($conexion,$query2);
   $ro= mysqli_fetch_row($sql);
   usleep(100000);
   clearstatcache();
    $fecha_db = strtotime($ro[0]);
}
$query3= "SELECT * FROM tbpedido ORDER BY timestramp DESC LIMIT 1";
$datos_query= mysqli_query($query3);
while ($row2=mysqli_fetch_array($datos_query)) {
    $ar['timestramp'] = strtotime($row2['timestramp']);
    $ar[''] = $row2['idProducto'];


}
$dato_query =  json_encode($ar);
echo $dato_query;

?>