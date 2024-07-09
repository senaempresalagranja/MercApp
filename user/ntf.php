<?php
require_once "../conn.php";

set_time_limit(0);
 
$fecha = strtotime("1+day");
$fecha_ac=date("Y-m-d ", $fecha);
$query= mysqli_query($conn,"SELECT fechaInicio, fechaFin FROM  tbpromocion ORDER BY fechaInicio DESC LIMIT 1");
$row= mysqli_fetch_row($query);
$fecha_db =$row[1];

while ($fecha_db == $fecha_ac) {
    require_once "../conn.php";
   $query2= "SELECT fechaInicio FROM  tbpromocion ORDER BY fechaInicio DESC LIMIT 1";
   $sql= mysqli_query($conn,$query2);
   $ro= mysqli_fetch_row($sql);
   usleep(100000);
   clearstatcache();
    $fecha_db = strtotime($ro[0]);
}

$query3= "SELECT idPromocion, fechaInicio FROM  tbpromocion ORDER BY fechaInicio DESC LIMIT 1";
$datos_query= mysqli_query($conn,$query3);
while ($row2=mysqli_fetch_array($datos_query)) {
    
    $ar['idPromocion'] = $row2['idPromocion'];


$dato_query =  json_encode($ar);
echo $dato_query;
}
?>