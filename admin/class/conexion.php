<?php
$conexion=mysqli_connect('localhost',
'root',
'',
'dbmercapp');
$query= mysqli_query($conexion,"SELECT timestramp FROM  tbpedido ORDER BY timestramp DESC LIMIT 1 ");
$row= mysqli_fetch_row($query);
?>