<?php
include('../conn.php');
include('session.php') ;


$total=$_POST['total'];

if(preg_match("/^[0-9,]+$/", $total)){
    $new=$total;
}
else{
     $new = str_replace(arraY(',', '.00'), '', $total);
 }


    $exixtencias = mysqli_query($conn, "SELECT tbproducto.idProducto, `existencia`  FROM `tbproducto` INNER JOIN tbpedidoproducto ON tbpedidoproducto.idProducto = tbproducto.idProducto WHERE tbpedidoproducto.idPedido =" . $_SESSION['pedido'] . "");
    $pedido = mysqli_query($conn, "SELECT  `idProducto`, `cantidadPedida` , `valorUnitario` FROM `tbpedidoproducto` WHERE tbpedidoproducto.idPedido =" . $_SESSION['pedido'] . "");
    $vlrt = 0;
    while ($row2 = mysqli_fetch_array($pedido)) {
        $row1 = mysqli_fetch_array($exixtencias);
        
        $newqty = $row1['existencia'] - $row2['cantidadPedida'];
        if ($row1['existencia'] == 0) {
            $vlrt =+ 0;
            mysqli_query($conn, "UPDATE `tbpedidoproducto` SET `cantidadEntregada`= '0', `valorTotalEntregado`='0' WHERE  idPedido = " . $_SESSION['pedido'] . " AND  idProducto = " . $row2['idProducto'] . " ");
        } else if ($newqty >= 0) {
            
            $vlrP = $row2['valorUnitario'] * $row2['cantidadPedida'];
            $vlrt = $vlrt + $vlrP;
            mysqli_query($conn, "UPDATE `tbpedidoproducto` SET `cantidadEntregada`= '".$row2['cantidadPedida']."', `valorTotalEntregado`='$vlrP' WHERE  idPedido = " . $_SESSION['pedido'] . " AND  idProducto = " . $row2['idProducto'] . " ");
            mysqli_query($conn, "UPDATE `tbproducto` SET`existencia`= $newqty  WHERE  idProducto = " . $row2['idProducto'] . " ");
        } else {
            $vlrP = $row2['valorUnitario'] * $row1['existencia'];
            $vlrt = $vlrt + $vlrP;
            mysqli_query($conn, "UPDATE `tbproducto` SET`existencia`= $newqty  WHERE  idProducto = " . $row2['idProducto'] . " ");
            
            mysqli_query($conn, "UPDATE `tbpedidoproducto` SET `cantidadEntregada`= '".$row1['existencia']."', `valorTotalEntregado`=' $vlrP' WHERE  idPedido = " . $_SESSION['pedido'] . " AND  idProducto = " . $row2['idProducto'] . " ");
        }
        
        
    }
    date_default_timezone_set("America/Bogota");
    $hora=strtotime($_POST['hora']);
    $hora3 = date('Y-m-d H:i:s', $hora);
    $fecha = date("U");
    $fecha2=date("Y-m-d ", $fecha);
    $hora2= date("H:i:s", $fecha);
  
    
     mysqli_query($conn, "UPDATE `tbpedido` SET `valorPedido`='$new' ,`fechaPedido`='$fecha2' ,`horaPedido`='$hora2',`indicador`='1', `valorPedidoRealizado`='$vlrt',`lugar`='".$_POST['lugar']."',`horaEntregaPedido`=' $hora3'WHERE idPedido = " . $_SESSION['pedido'] . "  ");
     
    
    unset($_SESSION['pedido']);  
    clearstatcache(); 
// $sid=mysqli_insert_id($conn);

// $query=mysqli_query($conn,"select * from tbpedidoProducto where idusuario='".$_SESSION['id']."'");
// while($row=mysqli_fetch_array($query)){
//     mysqli_query($conn,"insert into sales_detail (idventa, idProducto, sales_qty) values ('$sid', '".$row['idProducto']."', '".$row['cantidad']."')");

//     $pro=mysqli_query($conn,"select * from tbpedidoProducto where idProducto='".$row['idProducto']."'");
//     $prorow=mysqli_fetch_array($pro);

//     $newqty=$prorow['existencia']-$row['cantidadPedida'];

//     mysqli_query($conn,"update tbproducto set existencia='$newqty' where idProducto='".$row['idProducto']."'");

//     mysqli_query($conn,"insert into inventory (idusuario, accion, idProducto, cantidad, fechaVenta) values ('".$_SESSION['id']."', 'compra', '".$row['idProducto']."', '".$row['cantidad']."', NOW())");
// }

// mysqli_query($conn,"delete from tbpedidoProducto  where idusuario='".$_SESSION['id']."'");
// header('location: history.php');
// echo
// $_POST['total'].
// $_POST['lugar'].
// $_POST['hora']
// ;
?>

<script type="text/javascript">
    window.location.replace('history.php')
</script>